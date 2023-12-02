<?php

namespace LTL\HubspotRequestBody\Core\Factory;

use LTL\HubspotRequestBody\Core\AbstractBody;
use LTL\HubspotRequestBody\Core\Factory\ActionFactory;
use ReflectionClass;

abstract class BodyFactory
{
    public static function build(string $bodyClass): AbstractBody
    {
        $reflectionClass = new ReflectionClass($bodyClass);

        $object = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionProperty = $reflectionClass->getProperty('action');
        $reflectionProperty->setValue($object, ActionFactory::build($object));
        
        return $object;
    }
}
