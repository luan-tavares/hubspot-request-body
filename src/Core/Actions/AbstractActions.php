<?php

namespace LTL\HubspotRequestBody\Core\Actions;

use LTL\HubspotRequestBody\Core\AbstractBody;

abstract class AbstractActions
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
}
