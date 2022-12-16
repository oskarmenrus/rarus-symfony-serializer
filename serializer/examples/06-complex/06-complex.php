<?php

declare(strict_types=1);

use Example\Examples;
use Example\Serializer;
use Symfony\Component\Serializer\Context;

require_once dirname(__DIR__) . '/autoload.php';

$serializer = Serializer\Factory::complex();

$data = [
    'value'          => 'ООО "ACME"',
    'address'        =>
        [
            'unrestricted_value' => '141600, Московская обл., г. City, ул. Street, д. Home',
        ],
    'kpp'            => '602001001',
    'capital'        => [
        'type'  => 'capital_type',
        'value' => 123.321,
    ],
    'management'     =>
        [
            'name'         => 'Surname Name Other',
            'post'         => 'Manager',
            'disqualified' => false,
        ],
    'founders'       => [
        [
            'inn'   => 'inn',
            'name'  => 'name',
            'type'  => 'type',
            'share' => 1,
        ]
    ],
    'managers'       => [
        [
            'inn'        => 'inn',
            'surname'    => 'surname',
            'name'       => 'name',
            'patronymic' => 'patronymic',
            'gender'     => 'gender',
            'post'       => 'post',
            'type'       => 'type',
        ]
    ],
    'branch_type'    => 'MAIN',
    'branch_count'   => 0,
    'type'           => 'LEGAL',
    'state'          =>
        [
            'status'            => 'LIQUIDATED',
            'code'              => '407',
            'actuality_date'    => 1555977600000,
            'registration_date' => 1150761600000,
            'liquidation_date'  => 1549411200000,
        ],
    'opf'            =>
        [
            'type'  => '2014',
            'code'  => '12300',
            'full'  => 'Общество с ограниченной ответственностью',
            'short' => 'ООО',
        ],
    'inn'            => '6020046475',
    'ogrn'           => '2065020035080',
    'okpo'           => null,
    'okato'          => null,
    'oktmo'          => null,
    'okogu'          => null,
    'okfs'           => null,
    'okved'          => '45.91.2',
    'okveds'         => [
        [
            'main' => true,
            'type' => 'type',
            'code' => 'code',
            'name' => 'name',
        ]
    ],
    'finance'        => null,
    'phones'         => [
        [
            'value'              => 'value',
            'unrestricted_value' => 'unrestricted_value',
        ],
    ],
    'emails'         => null,
    'ogrn_date'      => 1150761600000,
    'okved_type'     => '2014',
    'employee_count' => null,
    // И еще много данных, которые приходят в ответе от сервиса
];

$context = (new Context\Normalizer\ObjectNormalizerContextBuilder())
    ->withAllowExtraAttributes(false)
    ->toArray();

/** @var Examples\Complex\Company $company */
$company = $serializer->denormalize($data, Examples\Complex\Company::class, null, $context);

dump($company);
