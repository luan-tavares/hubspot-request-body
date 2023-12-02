<?php

namespace LTL\HubspotRequestBody\Resources;

use LTL\HubspotRequestBody\HubspotBody;

/**
 * @method static $this ids(int ...$id)
 * @method $this ids(int ...$id)
 */
class HubspotBatchDeleteBody extends HubspotBody
{
    protected string $resource = "batch-delete";
}