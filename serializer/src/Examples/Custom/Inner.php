<?php

declare(strict_types=1);

namespace Example\Examples\Custom;

// К вложенным объектам Serializer применяет те же методы: аннотации, порядок, вызов методов и т. д.
class Inner
{
    public function __construct(
        readonly string $language,
        readonly int $version,
    ) {
    }
}
