<?php

namespace LTL\HubspotRequestBody\Tests\BodyBuilder;

use LTL\HubspotRequestBody\Exceptions\HubspotBodyException;
use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class HubspotExceptionTest extends TestCase
{
    public function testThrowIfMethodIsCorrect()
    {
        $this->expectException(HubspotBodyException::class);

        HubspotBodyException::throwIf(true, 'Exception');
    }

    public function testIfMessageConstructIsCorrect()
    {
        $message = Request::class .'::method() in file.php on line 10 is incorrect!';

        $expectedMessage = str_replace(Request::class .'::', HubspotCrmCreateBody::class .'::', $message);

        $expectedMessage = str_replace(' in file.php on line 10', '', $expectedMessage);

        $exception = new HubspotBodyException($message, HubspotCrmCreateBody::class);

        $this->assertEquals($expectedMessage, $exception->getMessage());
    }

    public function testIfGetTraceInTestsIsCorrect()
    {
        try {
            HubspotCrmCreateBody::undefined();
        } catch (HubspotBodyException $exception) {
        }

        $this->assertEquals(__FILE__, $exception->getFile());
    }

    public function testIfGetTraceLoopIsCorrectInVendorPath()
    {
        /**
         * @var HubspotBodyException $exception
         */
        $exception = require __DIR__ .'/luan-tavares/hubspot-request-body/exception.php';

        $this->assertEquals(__FILE__, $exception->getFile());
    }

    public function testIfGetTraceLoopInVendorExamplesIsCorrect()
    {
        $exception = require __DIR__ .'/luan-tavares/hubspot-request-body/examples-hubspot-request-body/exception.php';

        $this->assertEquals(
            __DIR__ .'/luan-tavares/hubspot-request-body/examples-hubspot-request-body/exception.php',
            $exception->getFile()
        );
    }

    public function testIfToStringMagicMethodIsCorrect()
    {
        $exception = require __DIR__ .'/luan-tavares/hubspot-request-body/examples-hubspot-request-body/exception.php';

        $expectedMessage = '-'. HubspotBodyException::class .": {$exception->getMessage()} in {$exception->getFile()} on line {$exception->getLine()}";

        $this->assertEquals(
            $expectedMessage,
            '-'. $exception
        );
    }

    public function testIfTraceIteratorIsCorrect()
    {
        $trace = [
            [
                'line' => 15,
            ],
            [
                'file' => 'app/luan/teste2.php',
                'line' => 15,
            ],
            [
                'file' => 'app/luan/teste3.php',
                'line' => 15,
            ],
            [
                'file' => 'app/luan/teste4.php',
                'line' => 15,
            ]
        ];

        $exceptionMock = $this->getMockBuilder(HubspotBodyException::class)
            ->disableOriginalConstructor()->getMock();

        /**
         * @var HubspotBodyException $exceptionMock
         */
        $this->overrideExceptionTrace(
            $exceptionMock,
            $trace
        );
       
        $reflection = new ReflectionClass($exceptionMock);
        $constructor = $reflection->getConstructor();
        $constructor->invoke($exceptionMock, 'Message');

        $this->assertEquals('app/luan/teste2.php', $exceptionMock->getFile());
    }

    private function overrideExceptionTrace(
        HubspotBodyException $exception,
        array $trace
    ): void {
        $exceptionReflection = new \ReflectionObject($exception);
        
        
        while ($exceptionReflection->getParentClass() !== false) {
            $exceptionReflection = $exceptionReflection->getParentClass();
        }
        $traceReflection = $exceptionReflection->getProperty('trace');
        $traceReflection->setAccessible(true);
        $traceReflection->setValue($exception, $trace);
        $traceReflection->setAccessible(false);
    }
}