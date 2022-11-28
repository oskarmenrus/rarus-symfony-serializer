<?php

declare(strict_types=1);

namespace Example\Examples\Simple;

/**
 * Пример DTO в идеальном мире: все параметры в запросе совпадают с атрибутами класса
 * @path "/serializer/examples/01-simple/01-simple.php"
 */
class Command
{
    public function __construct(
        readonly int $id,

        readonly string $name,

        readonly float $rating,

        readonly string $phone,

        readonly bool $active,

        readonly array $roles,
    ) {
    }
}
