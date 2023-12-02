<?php

namespace LTL\HubspotRequestBody\Core\Actions\Traits;

trait BatchIdsTrait
{
    public function ids(int ...$id): self
    {
        $this->set('inputs', array_map(function ($item) {
            return [
                'id' => $item
            ];
        }, $id));

        return $this;
    }
}
