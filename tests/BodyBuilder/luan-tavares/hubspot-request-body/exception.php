<?php

use LTL\HubspotRequestBody\Exceptions\HubspotBodyException;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;

try {
    HubspotCrmCreateBody::undefined();
} catch (HubspotBodyException $exception) {
    return $exception;
}
