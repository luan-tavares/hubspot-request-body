<?php

use LTL\HubspotRequestBody\Resources\HubspotBatchGetBody;

require_once __DIR__ .'/__bootstrap.php';

$body = HubspotBatchGetBody::ids(1, 5, 6, 7, 8, 9)->properties('a', 'k');

dd($body);
