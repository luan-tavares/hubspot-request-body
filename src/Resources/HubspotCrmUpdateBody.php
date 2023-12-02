<?php

namespace LTL\HubspotRequestBody\Resources;

use LTL\HubspotRequestBody\HubspotBody;

/**
 * @method static $this properties(array $properties)
 * @method $this properties(array $properties)
 */
class HubspotCrmUpdateBody extends HubspotBody
{
    protected string $resource = "crm-update";
}