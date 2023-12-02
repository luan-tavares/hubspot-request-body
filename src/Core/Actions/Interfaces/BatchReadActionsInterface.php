<?php

namespace LTL\HubspotRequestBody\Core\Actions\Interfaces;

interface BatchReadActionsInterface
{
    public function ids(int ...$id): self;
    public function propertiesWithHistory(string ...$property): self;
    public function properties(string ...$property): self;
}
