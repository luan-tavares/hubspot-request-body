<?php

namespace LTL\HubspotRequestBody\Core\Actions;

use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Core\Actions\Interfaces\BatchDeleteActionsInterface;
use LTL\HubspotRequestBody\Core\Actions\Traits\BatchIdsTrait;
use LTL\HubspotRequestBody\Core\Actions\Traits\BatchVerifyTrait;

class BatchDeleteActions extends AbstractActions implements BatchDeleteActionsInterface
{
    use BatchIdsTrait, BatchVerifyTrait;
}
