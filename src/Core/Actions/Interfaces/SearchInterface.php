<?php

namespace LTL\HubspotRequestBody\Core\Actions\Interfaces;

use Closure;

interface SearchInterface
{
    public function after(string|int $after): self;
    public function limit(string|int $limit): self;
    public function filterGroup(Closure $callback): self;
    public function filterIn(string $property, array $values): self;
    public function filterNotIn(string $property, array $values): self;
    public function filterEqual(string $property, string|int $value): self;
    public function filterContains(string $property, string|int $value): self;
    public function filterNotEqual(string $property, string|int $value): self;
    public function filterBetween(string $property, string|int $value, string|int $highValue): self;
    public function filterLess(string $property, string|int $value): self;
    public function filterLessOrEqual(string $property, string|int $value): self;
    public function filterGreater(string $property, string|int $value): self;
    public function filterGreaterOrEqual(string $property, string|int $value): self;
    public function filterHas(string $property): self;
    public function filterNotHas(string $property): self;
    public function properties(string ...$property): self;
    public function sortAsc(string $property): self;
    public function sortDesc(string $property): self;
}
