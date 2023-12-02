<?php

namespace LTL\HubspotRequestBody\Resources;

use LTL\HubspotRequestBody\HubspotBody;

/**
 * @method static $this add(LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody $item)
 * @method $this add(LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody $item)
 */
class HubspotBatchCreateBody extends HubspotBody
{
    protected string $resource = "batch-create";
}