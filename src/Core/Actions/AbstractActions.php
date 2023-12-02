<?php

namespace LTL\HubspotRequestBody\Core\Actions;

use ArrayAccess;
use LTL\HubspotRequestBody\Core\AbstractBody;

abstract class AbstractActions implements ArrayAccess
{
    protected array $data = [];

    private array $indexes = [];

    protected AbstractBody $body;

    private function __construct()
    {
        
    }

    private function __clone()
    {
        
    }

    protected function verify(): void
    {
    }

    public function set(string $index, mixed $value): self
    {
        if($value instanceof AbstractBody) {
            $value = $value->get();
        }

        $this->data[$index] = $value;

        $this->verify();

        return $this;
    }

    public function push(string $index, mixed $value): self
    {
        if($value instanceof AbstractBody) {
            $value = $value->get();
        }

        $this->data[$index][] = $value;

        $this->verify();

        return $this;
    }

    public function all(): array
    {
        return $this->data;
    }

    protected function incrementIndex(string $index): void
    {
        $this->indexes[$index] = $this->getIndex($index) + 1;
    }

    protected function getIndex(string $index): int
    {
        return @$this->indexes[$index] ?? 0;
    }

    protected function resetIndex(string $index): void
    {
        $this->indexes[$index] = 0;
    }

    protected function hasNotResetedIndex(string $index): bool
    {
        return !($this->getIndex($index) === 0);
    }

    /** ArrayAccess */

    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($offset, $this->data);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->data[$offset];
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->data[$offset] = $value;
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$offset]);
    }
}
