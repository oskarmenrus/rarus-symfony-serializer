<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

use Symfony\Component\Serializer\Annotation;

class Finance
{
    public function __construct(
        #[Annotation\SerializedName('tax_system')]
        private ?string $taxSystem,
        private ?float $income,
        private ?float $expense,
        private ?float $debt,
        private ?float $penalty,
        private ?int $year
    ) {
    }

    public function getTaxSystem(): ?string
    {
        return $this->taxSystem;
    }

    public function setTaxSystem(?string $taxSystem): void
    {
        $this->taxSystem = $taxSystem;
    }

    public function getIncome(): ?float
    {
        return $this->income;
    }

    public function setIncome(?float $income): void
    {
        $this->income = $income;
    }

    public function getExpense(): ?float
    {
        return $this->expense;
    }

    public function setExpense(?float $expense): void
    {
        $this->expense = $expense;
    }

    public function getDebt(): ?float
    {
        return $this->debt;
    }

    public function setDebt(?float $debt): void
    {
        $this->debt = $debt;
    }

    public function getPenalty(): ?float
    {
        return $this->penalty;
    }

    public function setPenalty(?float $penalty): void
    {
        $this->penalty = $penalty;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): void
    {
        $this->year = $year;
    }
}
