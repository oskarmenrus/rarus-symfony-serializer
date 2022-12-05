<?php

declare(strict_types=1);

use Example\Examples;
use Example\Serializer;

require_once dirname(__DIR__) . '/autoload.php';

$serializer = Serializer\Factory::conflict();

$dateAsString = '1999-07-28';

// Оба зарегистрированных DenormalizerInterface подходят для этого типа
$dateTime = $serializer->denormalize($dateAsString, DateTime::class);

// DateTime: 1970-01-01 00:00:01.0 UTC (+00:00)
// Получаем не очевидный результат
dump($dateTime);

########################################################################################################################

// Попробуем изменить тип результирующего объекта, чтобы отработал встроенный Denormalizer
$dateTime = $serializer->denormalize($dateAsString, DateTimeImmutable::class);

// DateTimeImmutable: 1999-07-28 00:00:00.0 UTC (+00:00)
// То что надо, хоть и не совсем того типа
dump($dateTime);
