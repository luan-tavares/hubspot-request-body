<?php

namespace LTL\HubspotRequestBody\Helpers;

use LTL\HubspotRequestBody\Config;

abstract class BatchLimitHelper
{
    private static $limit = Config::MAX_BATCH;

    public static function get(): string
    {
        return self::$limit;
    }

    public static function set(int $limit): void
    {
        self::$limit = $limit;
    }
}
