<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

use Example\CustomTypes\UnixMilliseconds\UnixMillisecond;
use Symfony\Component\Serializer\Annotation;

class State
{
    public function __construct(
        private string $status,
        private ?string $code,
        #[Annotation\SerializedName('actuality_date')]
        private UnixMillisecond $actual,
        #[Annotation\SerializedName('registration_date')]
        private UnixMillisecond $registration,
        #[Annotation\SerializedName('liquidation_date')]
        private ?UnixMillisecond $liquidation,
    ) {
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    public function getActual(): UnixMillisecond
    {
        return $this->actual;
    }

    public function setActual(UnixMillisecond $actual): void
    {
        $this->actual = $actual;
    }

    public function getRegistration(): UnixMillisecond
    {
        return $this->registration;
    }

    public function setRegistration(UnixMillisecond $registration): void
    {
        $this->registration = $registration;
    }

    public function getLiquidation(): ?UnixMillisecond
    {
        return $this->liquidation;
    }

    public function setLiquidation(?UnixMillisecond $liquidation): void
    {
        $this->liquidation = $liquidation;
    }
}
