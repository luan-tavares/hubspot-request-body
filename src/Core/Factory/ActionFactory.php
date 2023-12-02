<?php

namespace LTL\HubspotRequestBody\Core\Factory;

use LTL\HubspotRequestBody\Config;
use LTL\HubspotRequestBody\Core\AbstractBody;
use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Helpers\ActionNamespaceHelper;
use ReflectionClass;

abstract class ActionFactory
{
    public static function build(AbstractBody $body): AbstractActions
    {
        $path = Config::BASE_PATH ."/src/schemas/{$body}.json";

        $schema = json_decode(file_get_contents($path));

        $actionClass = ActionNamespaceHelper::get($schema->action);

        $reflectionClass = new ReflectionClass($actionClass);

        /**
         * @var AbstractActions $object
         */
        $object = $reflectionClass->newInstanceWithoutConstructor();

        $reflectionProperty = $reflectionClass->getProperty('data');
        $reflectionProperty->setValue($object, json_decode(json_encode($schema->template), true));

        $reflectionProperty = $reflectionClass->getProperty('body');
        $reflectionProperty->setValue($object, $body);
        
        return $object;
    }
}
