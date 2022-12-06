<?php

/**
 * @noinspection PhpDuplicateCatchBodyInspection
 */
declare(strict_types=1);

use Example\Examples;
use Example\Serializer;
use Symfony\Component\Serializer\Exception;

require_once dirname(__DIR__) . '/autoload.php';

/**
 * В этом примере просто перечислены все исключения, которые есть в Serializer.
 * Дополнительно могут возникать исключения из вспомогательных библиотек, которые использует Serializer.
 *
 * Как обрабатывать эти исключения? В каждом случае нужен индивидуальный поход.
 * Например, если у Вас есть API, то должна быть и единая точка входа, в которой можно обработать эти исключения.
 *
 * Дополнительно можно ознакомиться с уроком Дмитрия Елисеева и самим репозиторием:
 * @link https://drive.google.com/file/d/1TakmyKwSH57ze1W-Pn5BrgDTJ3HSnmxD/view?usp=share_link
 * @link https://github.com/deworkerpro/demo-auction/blob/master/api/src/Http/Middleware/DenormalizationExceptionHandler.php
 *
 * В уроке приводится пример того, как можно создать Middleware, который перехватывает исключения Serializer
 * и формирует ответ с описанием ошибки.
 */
try {
    $serializer = Serializer\Factory::default();

//    $serializer->serialize();
//    $serializer->deserialize();
//    $serializer->normalize();
//    $serializer->denormalize();
//    $serializer->encode();
//    $serializer->decode();
} catch (Exception\ExtraAttributesException $exception) {
} catch (Exception\NotNormalizableValueException $notNormalizableValueException) {
} catch (Exception\PartialDenormalizationException $partialDenormalizationException) {
} catch (Exception\BadMethodCallException $badMethodCallException) {
} catch (Exception\CircularReferenceException $circularReferenceException) {
} catch (Exception\InvalidArgumentException $invalidArgumentException) {
} catch (Exception\LogicException $logicException) {
} catch (Exception\MappingException $mappingException) {
} catch (Exception\MissingConstructorArgumentsException $missingConstructorArgumentsException) {
} catch (Exception\NotEncodableValueException $notEncodableValueException) {
} catch (Exception\RuntimeException $runtimeException) {
} catch (Exception\UnexpectedValueException $unexpectedValueException) {
}
