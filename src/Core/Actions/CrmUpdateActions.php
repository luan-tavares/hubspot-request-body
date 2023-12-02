<?php

namespace LTL\HubspotRequestBody\Core\Actions;

use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Core\Actions\Interfaces\CrmUpdateActionsInterface;
use LTL\HubspotRequestBody\Core\Actions\Traits\PropertiesCreateOrUpdateTrait;

class CrmUpdateActions extends AbstractActions implements CrmUpdateActionsInterface
{
    use PropertiesCreateOrUpdateTrait;
}
