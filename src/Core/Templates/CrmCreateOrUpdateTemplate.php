<?php

namespace LTL\HubspotRequestBody\Core\Templates;

abstract class SearchTemplate
{
    public const TEMPLATE =  [
        'after' => 0,
        'limit' => 100,
        'properties' => [],
        'sorts' => [],
        'filterGroups' => [
            [
                'filters' => []
            ]
        ]
    ];
}
