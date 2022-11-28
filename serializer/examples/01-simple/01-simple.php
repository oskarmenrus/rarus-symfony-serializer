<?php

declare(strict_types=1);

use Example\Examples;
use Example\Serializer;

require_once dirname(__DIR__) . '/autoload.php';

$serializer = Serializer\Factory::create();

$data = [
    'id'        => 1,
    'name'      => 'Danil',
    'rating'    => 4.9,
    'telephone' => '+7 (978) 757-94-61',
    'active'    => true,
    'roles'     => ['user', 'subscriber']
];

/**
 * Для удобства в примерах далее используются с массивы, но можно работать и с закодированными строками:
 * $simpleCommand = $serializer->deserialize(json_encode($data), Dto\SimpleCommand::class, 'json');
 * В этом случае Serializer дополнительно использует соответствующий формату DecoderInterface и наоборот.
 */
$simpleCommand = $serializer->denormalize($data, Examples\Simple\Command::class);

dump($simpleCommand);
