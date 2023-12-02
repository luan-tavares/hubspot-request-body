<?php

namespace LTL\HubspotRequestBody\Core;

use Error;
use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Core\Factory\BodyFactory;
use LTL\HubspotRequestBody\Exceptions\HubspotBodyException;

abstract class AbstractBody
{
    protected string $resource;

    protected AbstractActions $action;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __call($method, $arguments)
    {

        try {
            $this->action->{$method}(...$arguments);
        } catch(Error $exception) {
            throw new HubspotBodyException($exception->getMessage());
        }

        return $this;
    }

    public static function __callStatic($method, $arguments)
    {
        return BodyFactory::build(static::class)->{$method}(...$arguments);
    }

    public function __toString()
    {
        return $this->resource;
    }

    public function __destruct()
    {
        unset($this->action);
    }

    public function get(): array
    {
        return $this->action->all();
    }
}
