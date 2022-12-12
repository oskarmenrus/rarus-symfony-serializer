<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

use Symfony\Component\Serializer\Annotation;

class Phone
{
    #[Annotation\Ignore]
    protected ?int $id;

    #[Annotation\Ignore]
    private Company $company;

    public function __construct(
        private string $value,
        #[Annotation\SerializedName('unrestricted_value')]
        private string $unrestrictedValue
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

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getUnrestrictedValue(): string
    {
        return $this->unrestrictedValue;
    }

    public function setUnrestrictedValue(string $unrestrictedValue): void
    {
        $this->unrestrictedValue = $unrestrictedValue;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): Phone
    {
        $this->company = $company;
        return $this;
    }
}
