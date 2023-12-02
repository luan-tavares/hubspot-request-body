<?php

namespace LTL\HubspotRequestBody\Core\Actions\Traits;

trait PropertiesCreateOrUpdateTrait
{
    public function properties(array $properties): self
    {
        return $this->set('properties', $properties);
    }
}
