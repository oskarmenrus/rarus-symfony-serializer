<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Address
{
    public function __construct(
        #[SerializedName('unrestricted_value')]
        private string $unrestricted
    ) {
    }

    public function getUnrestricted(): string
    {
        return $this->unrestricted;
    }

    public function setUnrestricted(string $unrestricted): void
    {
        $this->unrestricted = $unrestricted;
    }
}
