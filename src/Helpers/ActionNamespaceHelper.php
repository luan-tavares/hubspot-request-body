<?php

namespace LTL\HubspotRequestBody\Helpers;

abstract class ActionNamespaceHelper
{
    public static function get(string $actionClass): string
    {
        return "LTL\\HubspotRequestBody\\Core\\Actions\\{$actionClass}";
    }
}