<?php

declare(strict_types=1);

namespace Example\Examples\Complex;

use Symfony\Component\Serializer\Normalizer;

class Opf implements Normalizer\DenormalizableInterface
{
    private string $type;
    private string $code;
    private string $full;
    private string $short;
    private mixed $denormalizedAt;

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

    public function denormalize(
        Normalizer\DenormalizerInterface $denormalizer,
        float|int|bool|array|string $data,
        string $format = null,
        array $context = []
    ) {
        $this->type = $data['type'];
        $this->code = $data['code'];
        $this->full = $data['full'];
        $this->short = $data['short'];

        $this->denormalizedAt = $denormalizer->denormalize(date('Y-m-d H:i:s.u'), \DateTimeImmutable::class);
    }
}
