<?php


require_once __DIR__ .'/__bootstrap.php';

use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;

dd(HubspotCrmCreateBody::association(1, 100)->properties([
    'a' => 5
])->associationWithLabels(5111, [
    [
        'associationCategory' => '545',
        'associationTypeId' => 100
    ],
    [
        'associationCategory' => '545',
        'associationTypeId' => 101
    ]
]));
