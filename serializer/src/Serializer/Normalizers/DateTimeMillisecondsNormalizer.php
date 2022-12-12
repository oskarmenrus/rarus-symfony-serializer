<?php

declare(strict_types=1);

namespace Example\Serializer\Normalizers;

use DateTime;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DateTimeMillisecondsNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function denormalize($data, string $type, string $format = null, array $context = [])
    {
        $ticks = $data;
        $sec = (int)$ticks / 1000;

        return (new DateTime())->setTimestamp((int)$sec);
    }

    public function supportsDenormalization($data, string $type, string $format = null): bool
    {
        return $type === DateTime::class;
    }

    public function normalize(
        $object,
        string $format = null,
        array $context = []
    ): float|int|bool|\ArrayObject|array|string|null {
        /**
         * @var DateTime $object
         */
        return $object->getTimestamp();
    }

    public function supportsNormalization($data, string $format = null): bool
    {
        return $data instanceof DateTime;
    }
}
