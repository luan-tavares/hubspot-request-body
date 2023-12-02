<?php

namespace LTL\HubspotRequestBody\Core\Actions;

use Closure;
use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Core\Actions\Interfaces\SearchInterface;

class SearchActions extends AbstractActions implements SearchInterface
{
    public function after(string|int $after): self
    {
        return $this->set('after', $after);
    }

    public function limit(string|int $limit): self
    {
        return $this->set('limit', $limit);
    }

    /**
     * @param Closure(AbstractBody $body): void $callback
     */
    public function filterGroup(Closure $callback): self
    {
        if ($this->hasNotResetedIndex('filter')) {
            $this->incrementIndex('group');
            $this->resetIndex('filter');
        }

        $callback($this->body);

        $this->incrementIndex('group');
        $this->resetIndex('filter');

        return $this;
    }

    private function filter(string $property, string $operator, array|string|int|null $value = null, string|int|null $highValue = null): self
    {
        $filterGroups = $this['filterGroups'];
        $filterGroupIndex = $this->getIndex('group');
        $filterIndex = $this->getIndex('filter');

        $filterGroups[$filterGroupIndex]['filters'][$filterIndex] = [
            'propertyName' => $property,
            'operator' => $operator,
        ];

        if ($operator === 'IN' || $operator === 'NOT_IN') {
            $filterGroups[$filterGroupIndex]['filters'][$filterIndex]['values'] = $value;
            $this->incrementIndex('filter');

            return $this->set('filterGroups', $filterGroups);
        }

        if (!is_null($value)) {
            $filterGroups[$filterGroupIndex]['filters'][$filterIndex]['value'] = $value;
        }

        if (!is_null($highValue)) {
            $filterGroups[$filterGroupIndex]['filters'][$filterIndex]['highValue'] = $highValue;
        }

        $this->incrementIndex('filter');

        return $this->set('filterGroups', $filterGroups);
    }

    public function filterIn(string $property, array $values): self
    {
        return $this->filter($property, 'IN', $values);
    }

    public function filterNotIn(string $property, array $values): self
    {
        return $this->filter($property, 'NOT_IN', $values);
    }

    public function filterEqual(string $property, string|int $value): self
    {
        return $this->filter($property, 'EQ', $value);
    }

    public function filterContains(string $property, string|int $value): self
    {
        return $this->filter($property, 'CONTAINS_TOKEN', $value);
    }

    public function filterNotContains(string $property, string|int $value): self
    {
        return $this->filter($property, 'NOT_CONTAINS_TOKEN', $value);
    }

    public function filterNotEqual(string $property, string|int $value): self
    {
        return $this->filter($property, 'NEQ', $value);
    }

    public function filterBetween(string $property, string|int $value, string|int $highValue): self
    {
        return $this->filter($property, 'BETWEEN', $value, $highValue);
    }

    public function filterLess(string $property, string|int $value): self
    {
        return $this->filter($property, 'LT', $value);
    }

    public function filterLessOrEqual(string $property, string|int $value): self
    {
        return $this->filter($property, 'LTE', $value);
    }

    public function filterGreater(string $property, string|int $value): self
    {
        return $this->filter($property, 'GT', $value);
    }

    public function filterGreaterOrEqual(string $property, string|int $value): self
    {
        return $this->filter($property, 'GTE', $value);
    }

    public function filterHas(string $property): self
    {
        return $this->filter($property, 'HAS_PROPERTY');
    }

    public function filterNotHas(string $property): self
    {
        return $this->filter($property, 'NOT_HAS_PROPERTY');
    }

    public function properties(string ...$arguments): self
    {
        return $this->set('properties', $arguments);
    }

    private function sortBy(string $property, string $direction): self
    {
        $sorts = $this['sorts'];

        $sorts[] =  [
            'propertyName' => $property,
            'direction' => $direction
        ];

        return $this->set('sorts', $sorts);
    }

    public function sortAsc(string $property): self
    {
        return $this->sortBy($property, 'ASCENDING');
    }

    public function sortDesc(string $property): self
    {
        return $this->sortBy($property, 'DESCENDING');
    }
}
