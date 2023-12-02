<?php

namespace LTL\HubspotRequestBody\Resources;

use LTL\HubspotRequestBody\HubspotBody;

/**
 * @method static $this add(int $objectId, LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody $updateBody)
 * @method $this add(int $objectId, LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody $updateBody)
 */
class HubspotBatchUpdateBody extends HubspotBody
{
    protected string $resource = "batch-update";
}