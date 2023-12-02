<?php

namespace LTL\HubspotRequestBody\Core\Actions\Interfaces;

interface CrmCreateActionsInterface
{
    public function properties(array $properties): self;
    public function association(int $toObjectId, int $associationId, string $associationDefinition = 'HUBSPOT_DEFINED'): self;
    public function associationWithLabels(int $toObjectId, array $associations): self;
}
