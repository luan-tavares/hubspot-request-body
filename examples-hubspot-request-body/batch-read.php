<?php


require_once __DIR__ .'/__bootstrap.php';

use LTL\HubspotRequestBody\Resources\HubspotBatchReadBody;

$item = HubspotBatchReadBody::ids(1, 5, 9, 20)->properties('a', 'b');

dd($item);
