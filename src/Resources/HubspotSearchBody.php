<?php

namespace LTL\HubspotRequestBody\Resources;

use LTL\HubspotRequestBody\HubspotBody;

/**
 * @method static $this after(string|int $after)
 * @method $this after(string|int $after)
 * @method static $this limit(string|int $limit)
 * @method $this limit(string|int $limit)
 * @method static $this filterGroup(Closure $callback)
 * @method $this filterGroup(Closure $callback)
 * @method static $this filterIn(string $property, array $values)
 * @method $this filterIn(string $property, array $values)
 * @method static $this filterNotIn(string $property, array $values)
 * @method $this filterNotIn(string $property, array $values)
 * @method static $this filterEqual(string $property, string|int $value)
 * @method $this filterEqual(string $property, string|int $value)
 * @method static $this filterContains(string $property, string|int $value)
 * @method $this filterContains(string $property, string|int $value)
 * @method static $this filterNotEqual(string $property, string|int $value)
 * @method $this filterNotEqual(string $property, string|int $value)
 * @method static $this filterBetween(string $property, string|int $value, string|int $highValue)
 * @method $this filterBetween(string $property, string|int $value, string|int $highValue)
 * @method static $this filterLess(string $property, string|int $value)
 * @method $this filterLess(string $property, string|int $value)
 * @method static $this filterLessOrEqual(string $property, string|int $value)
 * @method $this filterLessOrEqual(string $property, string|int $value)
 * @method static $this filterGreater(string $property, string|int $value)
 * @method $this filterGreater(string $property, string|int $value)
 * @method static $this filterGreaterOrEqual(string $property, string|int $value)
 * @method $this filterGreaterOrEqual(string $property, string|int $value)
 * @method static $this filterHas(string $property)
 * @method $this filterHas(string $property)
 * @method static $this filterNotHas(string $property)
 * @method $this filterNotHas(string $property)
 * @method static $this properties(string ...$property)
 * @method $this properties(string ...$property)
 * @method static $this sortAsc(string $property)
 * @method $this sortAsc(string $property)
 * @method static $this sortDesc(string $property)
 * @method $this sortDesc(string $property)
 */
class HubspotSearchBody extends HubspotBody
{
    protected string $resource = "search";
}