<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

use Symfony\Component\Serializer\Annotation;

class Okved
{
    #[Annotation\Ignore]
    protected ?int $id;

    #[Annotation\Ignore]
    private Company $company;

    public function __construct(
        private bool $main,
        private string $type,
        private string $code,
        private string $name
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getMain(): bool
    {
        return $this->main;
    }

    public function setMain(bool $main): void
    {
        $this->main = $main;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): Okved
    {
        $this->company = $company;
        return $this;
    }
}
