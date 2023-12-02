<?php

namespace LTL\HubspotRequestBody\Resources;

use LTL\HubspotRequestBody\HubspotBody;

/**
 * @method static $this properties(array $properties)
 * @method $this properties(array $properties)
 * @method static $this association(int $toObjectId, int $associationId, string $associationDefinition = "HUBSPOT_DEFINED")
 * @method $this association(int $toObjectId, int $associationId, string $associationDefinition = "HUBSPOT_DEFINED")
 * @method static $this associationWithLabels(int $toObjectId, array $associations)
 * @method $this associationWithLabels(int $toObjectId, array $associations)
 */
class HubspotCrmCreateBody extends HubspotBody
{
    protected string $resource = "crm-create";
}