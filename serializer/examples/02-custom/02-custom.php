<?php

declare(strict_types=1);

use Example\Examples;
use Example\Serializer;

require_once dirname(__DIR__) . '/autoload.php';

$serializer = Serializer\Factory::create();

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
];

$customDto = $serializer->denormalize($data, Examples\Custom\Dto::class);

dump($customDto);
