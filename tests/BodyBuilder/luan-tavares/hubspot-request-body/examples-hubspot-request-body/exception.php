<?php

use LTL\HubspotRequestBody\Exceptions\HubspotBodyException;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;

try {
    HubspotCrmCreateBody::association([]);
} catch (HubspotBodyException $exception) {
    return $exception;
}
