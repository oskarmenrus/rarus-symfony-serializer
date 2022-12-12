<?php

declare(strict_types=1);

namespace Example\Examples\ExtraComplexity;

class FirstFilter
{
    public function __construct(
        private ?string $login,
        private ?\DateTimeInterface $from,
        private ?\DateTimeInterface $to,
    ) {
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function getFrom(): ?\DateTimeInterface
    {
        return $this->from;
    }

    public function getTo(): ?\DateTimeInterface
    {
        return $this->to;
    }

    public static function empty(): self
    {
        return new self(null, null, null);
    }

    public function withLogin(?string $login): self
    {
        $this->login = $login;
        return $this;
    }

    public function withFrom(?\DateTimeInterface $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function withTo(?\DateTimeInterface $to): self
    {
        $this->to = $to;
        return $this;
    }
}
