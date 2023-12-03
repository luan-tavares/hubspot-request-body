<?php

namespace LTL\Hubspot\Tests\BodyBuilder;

use LTL\HubspotRequestBody\Resources\HubspotCrmCreateBody;
use PHPUnit\Framework\TestCase;

class CrmCreateBodyTest extends TestCase
{
    private array $template = [
        'properties' => []
    ];

    public function testIfDefaultIsCorrect()
    {
        $requestBody = new HubspotCrmCreateBody;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfAssociationMethodIsCorrect()
    {
        $expected = $this->template;

        $types = [
            [
                'associationCategory' => 'HUBSPOT_DEFINED',
                'associationTypeId' => 100
            ]
        ];

        $expected['associations'] = [
            [
                'types' => $types,
                'to' => [
                    'id' => 10
                ]
            ],
            [
                'types' => $types,
                'to' => [
                    'id' => 11
                ]
            ]
        ];

        $requestBody = HubspotCrmCreateBody::association(10, 100)->association(11, 100);

        $this->assertEquals($expected, $requestBody->get());
    }

    public function testIfAssociationWithLabelsMethodIsCorrect()
    {
        $expected = $this->template;

        $types = [
            [
                'associationCategory' => 'HUBSPOT_DEFINED',
                'associationTypeId' => 100
            ],
            [
                'associationCategory' => 'USER_DEFINED',
                'associationTypeId' => 101
            ]
        ];

        $expected['associations'] = [
            [
                'types' => $types,
                'to' => [
                    'id' => 10
                ]
            ]
        ];

        $requestBody = HubspotCrmCreateBody::associationWithLabels(10, $types);

        $this->assertEquals($expected, $requestBody->get());
    }

    public function testIfPropertiesMethodIsCorrect()
    {
        $expected = $this->template;

        $properties = [
            'a' => 1,
            'b' => 'test'
        ];

        $expected['properties'] = $properties;

        $requestBody = HubspotCrmCreateBody::properties($properties);

        $this->assertEquals($expected, $requestBody->get());
    }
}
