<?php

declare(strict_types=1);

namespace Example\Examples\Simple;

use Symfony\Component\Serializer\Annotation;

class Command
{
    public function __construct(
        readonly private ?int $id,
        readonly private string $name,
        readonly private float $rating,

        #[Annotation\SerializedName('telephone')]
        readonly private string $phone,
        readonly private bool $active,
    ) {
    }
}
