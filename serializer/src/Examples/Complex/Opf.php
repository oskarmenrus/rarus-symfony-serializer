<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

class Opf
{
    public function __construct(
        private string $type,
        private string $code,
        private string $full,
        private string $short
    ) {
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getFull(): ?string
    {
        return $this->full;
    }

    public function setFull(string $full): void
    {
        $this->full = $full;
    }

    public function getShort(): ?string
    {
        return $this->short;
    }

    public function setShort(string $short): void
    {
        $this->short = $short;
    }
}
