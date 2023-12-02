<?php

namespace LTL\HubspotRequestBody\Core\Actions;

use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Core\Actions\Interfaces\BatchCreateActionsInterface;
use LTL\HubspotRequestBody\Core\Actions\Traits\BatchVerifyTrait;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;

class BatchCreateActions extends AbstractActions implements BatchCreateActionsInterface
{
    use BatchVerifyTrait;
    
    public function add(HubspotCrmCreateBody $createBody): self
    {
        return $this->push('inputs', $createBody);
    }
}
