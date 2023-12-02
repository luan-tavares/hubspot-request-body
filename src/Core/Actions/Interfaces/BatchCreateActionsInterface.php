<?php

namespace LTL\HubspotRequestBody\Core\Actions\Interfaces;

use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;

interface BatchCreateActionsInterface
{
    public function add(HubspotCrmCreateBody $item): self;
}
