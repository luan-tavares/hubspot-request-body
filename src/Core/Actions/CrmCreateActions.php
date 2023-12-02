<?php

namespace LTL\HubspotRequestBody\Core\Actions;

use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Core\Actions\Interfaces\CrmCreateActionsInterface;
use LTL\HubspotRequestBody\Core\Actions\Traits\PropertiesCreateOrUpdateTrait;

class CrmCreateActions extends AbstractActions implements CrmCreateActionsInterface
{
    use PropertiesCreateOrUpdateTrait;

    public function association(int $toObjectId, int $associationId, string $associationDefinition = 'HUBSPOT_DEFINED'): self
    {
        $types = [
            'associationCategory' => $associationDefinition,
            'associationTypeId' => $associationId
        ];

        $this->push('associations', [
            'types' => [$types],
            'to' => [
                'id' => $toObjectId
            ]
        ]);

        return $this;
    }

    public function associationWithLabels(int $toObjectId, array $associations): self
    {
        $this->push('associations', [
            'types' => $associations,
            'to' => [
                'id' => $toObjectId
            ]
        ]);
        
        return $this;
    }
}
