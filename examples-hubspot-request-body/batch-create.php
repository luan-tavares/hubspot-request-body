<?php


require_once __DIR__ .'/__bootstrap.php';

use LTL\HubspotRequestBody\Resources\HubspotBatchCreateBody;
use LTL\HubspotRequestBody\Resources\HubspotBatchReadBody;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;

$a = new HubspotBatchReadBody;

$item = HubspotCrmCreateBody::properties([
    'a' => 1
]);

dd(HubspotBatchCreateBody::add($item)->add($item));
