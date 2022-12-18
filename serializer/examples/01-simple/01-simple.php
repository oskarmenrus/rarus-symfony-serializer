<?php
/** @noinspection ForgottenDebugOutputInspection */

declare(strict_types=1);

use Example\Examples;
use Example\Serializer;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$serializer = Serializer\Factory::default();

// Ключ массива === название свойства класса
$data = [
    'int'      => 1,
    'string'   => 'Danil',
    'float'    => 4.9,
    'bool'     => true,
    'array'    => ['user', 'subscriber'],
    'nullable' => null, // Если явно не передавать null: Serializer заполнит его сам, при отсутствии в массиве
    'mixed'    => static function () { // O_o можно даже так
        return 'closure';
    },
];

/**
 * Для удобства в примерах далее используются с массивы, но можно работать и с закодированными строками:
 * $simpleCommand = $serializer->deserialize(json_encode($data), Dto\SimpleCommand::class, 'json');
 * В этом случае Serializer дополнительно использует соответствующий формату DecoderInterface и наоборот.
 */
$simpleCommand = $serializer->denormalize($data, Examples\Simple\Command::class);

dump($simpleCommand);
