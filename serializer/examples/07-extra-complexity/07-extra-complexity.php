<?php

declare(strict_types=1);

use Example\Examples\ExtraComplexity;
use Example\Serializer;
use Symfony\Component\Serializer\Context;

require_once dirname(__DIR__, 2) . '/vendor/autoload.php';

$serializer = Serializer\Factory::default();

/**
 * Предположим, что из формы приходит не просто $from и $to, а идентификатор week/month/year:
 * в зависимости от них создается объект \DatePeriod
 * т. е. мы никак эту кастомную логику создания периода не можем переложить на Serializer
 */
$from = new DateTimeImmutable('2022-12-01');
$to = new DateTimeImmutable('2022-12-31');
$period = new \DatePeriod($from, \DateInterval::createFromDateString('1 day'), $to);

$login = 'sokdan';

########################################################################################################################

// Теперь создаем два разных фильтра через Serializer

$common = [
    'login' => $login,
    'from'  => $period->getStartDate(),
    'to'    => $period->getEndDate(),
];

$context = (new Context\Normalizer\ObjectNormalizerContextBuilder())
    ->withDefaultContructorArguments([
        ExtraComplexity\FirstFilter::class  => $common,
        ExtraComplexity\SecondFilter::class => $common,
    ])
    ->toArray();

$firstFilter = $serializer->denormalize(null, type: ExtraComplexity\FirstFilter::class, context: $context);
$secondFilter = $serializer->denormalize(null, type: ExtraComplexity\SecondFilter::class, context: $context);

dump($firstFilter);
dump($secondFilter);

########################################################################################################################

// Создание этих же фильтров без Serializer

$firstFilter = ExtraComplexity\FirstFilter::empty()
    ->withLogin($login)
    ->withFrom($period->getStartDate())
    ->withTo($period->getEndDate());

$secondFilter = ExtraComplexity\SecondFilter::empty()
    ->withLogin($login)
    ->withFrom($period->getStartDate())
    ->withTo($period->getEndDate());

dump($firstFilter);
dump($secondFilter);
