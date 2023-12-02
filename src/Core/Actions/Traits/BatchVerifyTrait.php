<?php

namespace LTL\HubspotRequestBody\Core\Actions\Traits;

use LTL\HubspotRequestBody\Exceptions\HubspotBodyException;
use LTL\HubspotRequestBody\Helpers\BatchLimitHelper;

trait BatchVerifyTrait
{
    protected function verify(): void
    {
        $maxBatch = BatchLimitHelper::get();

        if(count($this['inputs']) > $maxBatch) {
            throw new HubspotBodyException("Batch input can't more {$maxBatch} items.");
        }
    }
}
