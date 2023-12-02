<?php

namespace LTL\HubspotRequestBody\Core\Actions\Traits;

trait PropertiesGetTrait
{
    public function properties(string ...$property): self
    {
        return $this->set('properties', $property);
    }
}
