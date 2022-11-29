<?php

declare(strict_types=1);

namespace Example\Examples\Custom;

use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Annotation;

/**
 * Более сложный пример с применением трюков Serializer.
 * Порядок заполнения свойств: конструктор, методы, публичные свойства.
 * @path "ProjectDir/serializer/examples/02-custom/02-custom.php"
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

    private bool $isBool;

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
    ) {
        $this->isBool = $isBool === 'Y';
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
}
