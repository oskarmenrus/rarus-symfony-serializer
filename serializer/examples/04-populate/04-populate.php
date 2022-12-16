<?php

declare(strict_types=1);

use Example\Examples;
use Example\Serializer;
use Symfony\Component\Serializer\Context;

require_once dirname(__DIR__) . '/autoload.php';

$serializer = Serializer\Factory::default();

$data = [
    'login'   => 'random', // Свойство будет проигнорировано благодаря атрибутам
    'city'    => 'Sevastopol', //  Лишнее свойство игнорируется по умолчанию
    'name'    => 'Danil',
    'surname' => 'Sokolov',
];

$command = new Examples\Populate\Command('sokdan');

$context = (new Context\Normalizer\ObjectNormalizerContextBuilder())
    ->withObjectToPopulate($command)
    ->toArray();

$populate = $serializer->denormalize($data, Examples\Populate\Command::class, null, $context);

// ^ Example\Examples\Populate\Command^ {#38
//     +name: "Danil"
//     +surname: "Sokolov"
//     +login: "sokdan"
// }
dump($populate);

########################################################################################################################

$data = [
    'login'     => 'random', // Свойство будет проигнорировано благодаря атрибутам + withAllowExtraAttributes(false)
    'injection' => 'hack', // Exception
    'name'      => 'Edward',
    'surname'   => 'Snowden',
];

$command = new Examples\Populate\Command('sokdan');

$context = (new Context\Normalizer\ObjectNormalizerContextBuilder())
    ->withAllowExtraAttributes(false) // Исключаем любые свойства, которых нет в классе
    ->withObjectToPopulate($command)
    ->toArray();

$populate = $serializer->denormalize($data, Examples\Populate\Command::class, null, $context);

// Fatal error: Uncaught Symfony\Component\Serializer\Exception\ExtraAttributesException:
// Extra attributes are not allowed ("login", "injection" are unknown).
dump($populate);
