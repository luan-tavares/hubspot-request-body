<?php

namespace LTL\Hubspot\Tests\BodyBuilder;

use LTL\HubspotRequestBody\Resources\HubspotBatchReadBody;
use PHPUnit\Framework\TestCase;

class BatchReadBodyTest extends TestCase
{
    private array $template = [
        'inputs' => []
    ];

    public function testIfDefaultIsCorrect()
    {
        $requestBody = new HubspotBatchReadBody;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfIdsMethodIsCorrect()
    {
        $expected = [
            'inputs' => [
                [
                    'id' => 1
                ],
                [
                    'id' => 2
                ],
            ]
        ];

        $requestBody = HubspotBatchReadBody::ids(1, 2);

        $this->assertEquals($expected, $requestBody->get());
    }

    public function testIfPropertiesMethodIsCorrect()
    {
        $expected = [
            'inputs' => [],
            'properties' => [
                'a',
                'b'
            ]
        ];

        $requestBody = HubspotBatchReadBody::properties('a', 'b');

        $this->assertEquals($expected, $requestBody->get());
    }
}
