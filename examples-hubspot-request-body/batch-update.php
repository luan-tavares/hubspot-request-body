<?php


require_once __DIR__ .'/__bootstrap.php';

use LTL\HubspotRequestBody\Resources\HubspotBatchUpdateBody;
use LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody;

$item = HubspotCrmUpdateBody::properties([
    'a' => 1
]);

dd(HubspotBatchUpdateBody::add(100, $item)->add(200, $item)->add(155, $item));
