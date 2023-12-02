<?php

namespace LTL\HubspotRequestBody\Core\Actions;

use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Core\Actions\Interfaces\BatchUpdateActionsInterface;
use LTL\HubspotRequestBody\Core\Actions\Traits\BatchVerifyTrait;
use LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody;

class BatchUpdateActions extends AbstractActions implements BatchUpdateActionsInterface
{
    use BatchVerifyTrait;
    
    public function add(int $objectId, HubspotCrmUpdateBody $updateBody): self
    {
        return $this->push('inputs', ['id' => $objectId, ...$updateBody->get()]);
    }
}
