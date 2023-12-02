<?php

namespace LTL\HubspotRequestBody\Core\Actions\Interfaces;

interface BatchDeleteActionsInterface
{
    public function ids(int ...$id): self;
}
