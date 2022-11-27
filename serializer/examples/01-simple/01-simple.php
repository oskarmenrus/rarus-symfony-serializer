<?php

declare(strict_types=1);

use Examples\Serializer;

require_once dirname(__DIR__) . '/autoload.php';

$serializer = Serializer\Factory::create();

dump($serializer->supportsDecoding('json'));
