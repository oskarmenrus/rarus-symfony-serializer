<?php

declare(strict_types=1);

namespace Example\Examples\Populate;

use Symfony\Component\Serializer\Annotation;

/**
 * Объект можно не просто собрать с нуля, но и заполнить недостающие свойства у существующего объекта.
 *
 * Например, есть команда для смены имени и фамилии пользователя.
 * Логин пользователя достается в контроллере из сессии.
 * Предположим, что можно вызвать эту команду по API.
 * Для защиты нужно игнорировать параметром с логином. В случае если "злоумышленник" захочет подправить чужие данные.
 *
 * @see "ProjectDir/serializer/examples/04-populate/04-populate.php"
 */
class Command
{
    public string $name;
    public string $surname;

    public function __construct(
        #[Annotation\Ignore]
        public string $login,
    ) {
    }
}
