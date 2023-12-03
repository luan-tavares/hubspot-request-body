<?php

namespace LTL\Hubspot\Tests\BodyBuilder;

use LTL\HubspotRequestBody\Resources\HubspotBatchUpdateBody;
use LTL\HubspotRequestBody\Resources\HubspotCrmUpdateBody;
use PHPUnit\Framework\TestCase;

class BatchUpdateBodyTest extends TestCase
{
    private array $template = [
        'inputs' => []
    ];

    public function testIfDefaultIsCorrect()
    {
        $requestBody = new HubspotBatchUpdateBody;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfAddMethodIsCorrect()
    {
        $expected = [
            'inputs' => [
                [
                    'id' => 1,
                    'properties' => [
                        'a' => 'test'
                    ]
                ],
                [
                    'id' => 2,
                    'properties' => [
                        'a' => 'test'
                    ]
                ],
            ]
        ];

        $item = HubspotCrmUpdateBody::properties([
            'a' => 'test'
        ]);

        $requestBody = HubspotBatchUpdateBody::add(1, $item)->add(2, $item);

        $this->assertEquals($expected, $requestBody->get());
    }
}
