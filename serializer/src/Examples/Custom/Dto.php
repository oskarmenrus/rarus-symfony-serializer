<?php

declare(strict_types=1);

namespace Example\Examples\Custom;

use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Annotation;
use Symfony\Component\Serializer\Context\Normalizer\AbstractNormalizerContextBuilder;

/**
 * Более сложный пример с применением трюков Serializer.
 * Порядок заполнения свойств: конструктор, методы, публичные свойства.
 * @see "ProjectDir/serializer/examples/02-custom/02-custom.php"
 *
 * ВАЖНО: не все NormalizerInterface могут работать с приватными свойствами.
 * В документации можно ознакомиться с одним из таких примеров, работающим через рефлексию.
 * @link https://github.com/symfony/symfony/blob/6.1/src/Symfony/Component/Serializer/Normalizer/PropertyNormalizer.php
 */
class Dto
{
    /**
     * Этот массив приватный и заполняется Serializer через специальные методы add/remove. Обязательны оба метода.
     * Благодаря {@see PropertyInfoExtractor} Serializer знает, что ожидается массив строк.
     * При помощи {@see PropertyAccessor} массив заполняется.
     *
     * @var string[]
     */
    private array $names = [];

    readonly private bool $isBool;

    readonly private string $currentUser;

    private $exists;

    public function __construct(
        // Название свойства в исходных данных не совпадает с названием в классе
        #[Annotation\SerializedName('identifier')]
        readonly string $uuid,

        // Вложенный объект: Serializer попытается собрать его по стандартным правилам: конструктор, методы, свойства
        readonly Inner $inner,

        /**
         * @var ForArray[] $arrayObjects
         */
        readonly array $arrayObjects,

        // Serializer не преобразует никак типы: это не его ответственность.
        // Если из формы прилетает значение чек-бокса, то конвертировать его в bool можно в конструкторе или сеттере
        string $isBool,

        /**
         * Допустим, этот параметр может браться только из сессии: передаем его в Serializer как параметр по умолчанию
         * Для удобства можно воспользоваться построителем контекста: {@see AbstractNormalizerContextBuilder}
         */
        string $currentUser,
    ) {
        $this->isBool = $isBool === 'Y';

        $this->currentUser = $currentUser;
    }

    public function getNames(): array
    {
        return $this->names;
    }

    public function addName(string $name): void
    {
        $this->names[$name] = $name;
    }

    public function removeName(string $name): void
    {
        unset($this->names[$name]);
    }

    // Благодаря этому методу Serializer сможет понять, что:
    // 1. Свойство $exist в методе setExists() типа bool.
    // 2. В случае несовпадения типов — выбросить исключение.
    // Работает и с has/can + доп. настройки PropertyTypeExtractorInterface.
    // Удобно, если использовать старые версии php без типизации свойств, в каком-нибудь 7.1.33 :)
    public function isExists(): bool
    {
        return $this->exists;
    }

    public function setExists($exists): void
    {
        $this->exists = $exists;
    }
}
