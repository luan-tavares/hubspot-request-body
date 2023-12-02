<?php

namespace LTL\HubspotRequestBody\Resources;

use LTL\HubspotRequestBody\HubspotBody;

/**
 * @method static $this ids(int ...$id)
 * @method $this ids(int ...$id)
 * @method static $this propertiesWithHistory(string ...$property)
 * @method $this propertiesWithHistory(string ...$property)
 * @method static $this properties(string ...$property)
 * @method $this properties(string ...$property)
 */
class HubspotBatchGetBody extends HubspotBody
{
    protected string $resource = "batch-get";
}