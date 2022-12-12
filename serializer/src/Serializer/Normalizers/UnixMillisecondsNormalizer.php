<?php

declare(strict_types=1);

namespace Example\Serializer\Normalizers;

use Example\CustomTypes\UnixMilliseconds\UnixMillisecond;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UnixMillisecondsNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): UnixMillisecond
    {
        return new UnixMillisecond($data);
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null): bool
    {
        return $type === UnixMillisecond::class;
    }

    public function normalize(
        mixed $object,
        string $format = null,
        array $context = []
    ): float|int|bool|\ArrayObject|array|string|null {
        /**
         * @var UnixMillisecond $object
         */
        return $object->getValue();
    }

    public function supportsNormalization(mixed $data, string $format = null): bool
    {
        return $data instanceof UnixMillisecond;
    }
}
