<?php

declare(strict_types=1);

namespace Example\Serializer;

use Doctrine\Common\Annotations\AnnotationReader;
use Example\Serializer\Normalizers\DateTimeMillisecondsNormalizer;
use Example\Serializer\Normalizers\OpfNormalizer;
use Example\Serializer\Normalizers\UnixMillisecondsNormalizer;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\CustomNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Factory
{
    // Serializer настроенный по умолчанию из документации
    public static function default(): Serializer
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $extractor = new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()]);

        $encoders = [new JsonEncoder()];
        $normalizers = [
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(
                $classMetadataFactory,
                $metadataAwareNameConverter,
                null,
                $extractor,
            ),
        ];

        return new Serializer($normalizers, $encoders);
    }

    /**
     * Serializer с конфликтом Normalizers
     * @see "ProjectDir/serializer/examples/03-conflict/03-conflict.php"
     *
     * Если углубиться немного в код и посмотреть логику выбора {Normalizer/Denormalizer}Interface.
     * Окажется, что выбирается тот, который первым подходит под условия и в принципе находится ближе к началу массива.
     * Вполне логично, но может привести к ошибкам.
     */
    public static function conflict(): Serializer
    {
        $normalizers = [
            new DateTimeMillisecondsNormalizer(),
            new DateTimeNormalizer(),
        ];

        return new Serializer($normalizers, []);
    }

    // Serializer c дополнительными настройками
    public static function complex(): Serializer
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

        $reflectionExtractor = new ReflectionExtractor(arrayMutatorPrefixes: ['attach', 'detach']);
        $phpDocExtractor = new PhpDocExtractor();

        $propertyAccessor = new PropertyAccessor(writeInfoExtractor: $reflectionExtractor);
        $propertyTypeExtractor = new PropertyInfoExtractor([], [$phpDocExtractor, $reflectionExtractor]);

        $encoders = [new JsonEncoder()];
        $normalizers = [
            new UnixMillisecondsNormalizer(),
            new CustomNormalizer(),
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(
                $classMetadataFactory,
                $metadataAwareNameConverter,
                $propertyAccessor,
                $propertyTypeExtractor,
            ),
        ];

        return new Serializer($normalizers, $encoders);
    }
}
