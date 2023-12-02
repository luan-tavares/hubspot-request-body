<?php

namespace LTL\HubspotRequestBody\Core\Actions\Interfaces;

use LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody;

interface BatchUpdateActionsInterface
{
    public function add(int $objectId, HubspotCrmUpdateBody $updateBody): self;
}
