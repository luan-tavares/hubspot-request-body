<?php

namespace LTL\HubspotRequestBody\Core\Actions;

use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Core\Actions\Interfaces\BatchGetActionsInterface;
use LTL\HubspotRequestBody\Core\Actions\Traits\BatchIdsTrait;
use LTL\HubspotRequestBody\Core\Actions\Traits\BatchVerifyTrait;
use LTL\HubspotRequestBody\Core\Actions\Traits\PropertiesGetTrait;

class BatchGetActions extends AbstractActions implements BatchGetActionsInterface
{
    use BatchIdsTrait, PropertiesGetTrait, BatchVerifyTrait;

    public function propertiesWithHistory(string ...$property): self
    {
        return $this->set('propertiesWithHistory', $property);
    }
}
