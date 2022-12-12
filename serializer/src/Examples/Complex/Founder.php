<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

use Symfony\Component\Serializer\Annotation;

class Founder
{
    #[Annotation\Ignore]
    protected ?int $id;

    #[Annotation\Ignore]
    private Company $company;

    public function __construct(
        private ?string $inn,
        private string $name,
        private string $type,
        private ?int $share
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

    public function getInn(): ?string
    {
        return $this->inn;
    }

    public function setInn(?string $inn): void
    {
        $this->inn = $inn;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getShare(): int
    {
        return $this->share;
    }

    public function setShare(?int $share): void
    {
        $this->share = $share;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): Founder
    {
        $this->company = $company;
        return $this;
    }
}
