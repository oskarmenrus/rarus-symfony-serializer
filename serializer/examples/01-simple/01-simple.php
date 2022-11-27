<?php

declare(strict_types=1);

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$serializer = \Examples\Serializer\Factory::create();

var_dump($serializer->supportsDecoding('json'));
