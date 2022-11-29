<?php

declare(strict_types=1);

namespace Example\Examples\Simple;

/**
 * Пример DTO в идеальном мире: все параметры во входных данных совпадают с атрибутами класса
 * @see "ProjectDir/serializer/examples/01-simple/01-simple.php"
 */
class Command
{
    public function __construct(
        readonly int $int,

        readonly string $string,

        readonly float $float,

        readonly bool $bool,

        readonly array $array,

        readonly ?string $nullable,

        readonly mixed $mixed,
    ) {
    }
}
