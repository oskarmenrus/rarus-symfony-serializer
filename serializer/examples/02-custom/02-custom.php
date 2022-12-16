<?php

declare(strict_types=1);

use Example\Examples;
use Example\Serializer;
use Symfony\Component\Serializer\Context;

require_once dirname(__DIR__) . '/autoload.php';

$serializer = Serializer\Factory::default();

$data = [
    'identifier'   => '00000000-0000-0000-0000-000000000001', // Оригинальное название свойства: $uuid
    'inner'        => [
        'language' => 'php',
        'version'  => 8,
    ],
    'arrayObjects' => [
        ['random' => 'value1'],
        ['random' => 'value2'],
    ],
    'names'        => ['name1', 'name2'],
    'isBool'       => 'Y',
//    'currentUser'       => 'sokdan', // Это свойство не передается во входных данных, но оно нужно в конструкторе
//    'exists'    => 'string', // Ожидается, что это свойство будет типа bool, а не string
];

$contextBuilder = (new Context\Normalizer\ObjectNormalizerContextBuilder())
    ->withDefaultContructorArguments([Examples\Custom\Dto::class => ['currentUser' => 'sokdan']]);

$customDto = $serializer->denormalize(
    $data,
    Examples\Custom\Dto::class,
    null,
    $contextBuilder->toArray()
);

dump($customDto);
