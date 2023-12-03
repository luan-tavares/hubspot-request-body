<?php

namespace LTL\Hubspot\Tests\BodyBuilder;

use LTL\HubspotRequestBody\Core\Actions\AbstractActions;
use LTL\HubspotRequestBody\Core\Actions\CrmCreateActions;
use LTL\HubspotRequestBody\Core\Factory\ActionFactory;
use LTL\HubspotRequestBody\Exceptions\HubspotBodyException;
use LTL\HubspotRequestBody\Helpers\BatchLimitHelper;
use LTL\HubspotRequestBody\Resources\HubspotBatchCreateBody;
use LTL\HubspotRequestBody\Resources\HubspotBatchReadBody;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class AbstractBodyTest extends TestCase
{
    public function testIfVerifyInSetWorks()
    {
        BatchLimitHelper::set(1);

        $item = HubspotCrmCreateBody::properties([
            'a' => 1
        ]);

        $this->expectException(HubspotBodyException::class);

        HubspotBatchCreateBody::add($item)->add($item);
    }

    public function testIfVerifyInPushWorks()
    {
        BatchLimitHelper::set(2);

        $this->expectException(HubspotBodyException::class);

        HubspotBatchReadBody::ids(1, 2, 3);
    }

    public function testIfLimitBatchWorks()
    {
        BatchLimitHelper::set(2);

        $this->expectNotToPerformAssertions();

        HubspotBatchReadBody::ids(1, 2);
    }

    public function testIfVerifyIsProtected()
    {
        $reflectionClass = new ReflectionClass(AbstractActions::class);

        $reflectionMethod = $reflectionClass->getMethod('verify');

        $this->assertTrue($reflectionMethod->isProtected());
    }

    public function testIfPushMethodResolveAbstractBodyInstance()
    {
        $expected = [
            'inputs' => [
                [
                    'properties' => [
                        'a' => 1
                    ]
                ]
            ]
        ];

        $item = HubspotCrmCreateBody::properties([
            'a' => 1
        ]);

        $action = ActionFactory::build(new HubspotBatchCreateBody);

        $action->push('inputs', $item);

        $this->assertEquals($expected, $action->all());
    }

    public function testIfSetMethodResolveAbstractBodyInstance()
    {
        $expected = [
            'inputs' => [
                'properties' => [
                    'a' => 1
                ]
            ]
        ];

        $item = HubspotCrmCreateBody::properties([
            'a' => 1
        ]);

        $action = ActionFactory::build(new HubspotBatchCreateBody);

        $action->set('inputs', $item);

        $this->assertEquals($expected, $action->all());
    }

    public function testIfCallUndefinedMethodThrowException()
    {
        $this->expectException(HubspotBodyException::class);

        HubspotBatchReadBody::undefined();
    }

    public function testIfWrongParamMethodThrowException()
    {
        $this->expectException(HubspotBodyException::class);

        HubspotBatchReadBody::ids([]);
    }
}
