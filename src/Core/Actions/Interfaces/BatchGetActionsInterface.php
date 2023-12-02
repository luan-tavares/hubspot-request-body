<?php

namespace LTL\HubspotRequestBody\Core\Actions\Interfaces;

interface BatchGetActionsInterface
{
    public function ids(int ...$id): self;
    public function propertiesWithHistory(string ...$property): self;
    public function properties(string ...$property): self;
}
