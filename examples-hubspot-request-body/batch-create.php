<?php


require_once __DIR__ .'/__bootstrap.php';

use LTL\HubspotRequestBody\Resources\HubspotBatchCreateBody;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;

$item = HubspotCrmCreateBody::properties([
    'a' => 1
]);

dd(HubspotBatchCreateBody::add($item)->add($item));
