<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

class Management
{
    public function __construct(
        private ?string $name,
        private ?string $post,
        private ?bool $disqualified
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPost(): string
    {
        return $this->post;
    }

    public function setPost(?string $post): void
    {
        $this->post = $post;
    }

    public function getDisqualified(): ?bool
    {
        return $this->disqualified;
    }

    public function setDisqualified(?bool $disqualified): void
    {
        $this->disqualified = $disqualified;
    }
}
