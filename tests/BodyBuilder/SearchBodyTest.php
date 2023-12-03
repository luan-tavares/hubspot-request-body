<?php

namespace LTL\Hubspot\Tests\BodyBuilder;

use LTL\HubspotRequestBody\Resources\HubspotSearchBody;
use PHPUnit\Framework\TestCase;

class SearchBodyTest extends TestCase
{
    private array $template = [
        'after' => 0,
        'limit' => 100,
        'filterGroups' => [
            [
                'filters' => []
            ]
        ]
    ];

    public function testIfDefaultIsCorrect()
    {
        $requestBody = new HubspotSearchBody;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfAfterIsCorrect()
    {
        $after = '1000';

        $requestBody = HubspotSearchBody::after($after);

        $this->template['after'] = $after;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfLimitIsCorrect()
    {
        $limit = 40;

        $requestBody = HubspotSearchBody::limit($limit);

        $this->template['limit'] = $limit;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterEqualIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'name',
                        'operator' => 'EQ',
                        'value' => 10
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterEqual('name', 10);

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterHasIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'name',
                        'operator' => 'HAS_PROPERTY'
                    ]
                ]
            ]
            
        ];

        $requestBody = HubspotSearchBody::filterHas('name');

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterNotHasIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'name',
                        'operator' => 'NOT_HAS_PROPERTY'
                    ]
                ]
            ]
            
        ];

        $requestBody = HubspotSearchBody::filterNotHas('name');

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfSortAscIsCorrect()
    {
        $sort = [
            [
                'propertyName' => 'name',
                'direction' => 'ASCENDING'
            ]
        ];

        $requestBody = HubspotSearchBody::sortAsc('name');

        $this->template['sorts'] = $sort;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfPropertiesIsCorrect()
    {
        $properties = [
            'a', 'b', 'c'
        ];

        $requestBody = HubspotSearchBody::properties('a', 'b', 'c');

        $this->template['properties'] = $properties;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfSortDescIsCorrect()
    {
        $sort = [
            [
                'propertyName' => 'name',
                'direction' => 'DESCENDING'
            ]
        ];

        $requestBody = HubspotSearchBody::sortDesc('name');

        $this->template['sorts'] = $sort;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterGroupIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'id',
                        'operator' => 'HAS_PROPERTY'
                    ]
                ]
            ],
            [
                'filters' => [
                   
                    [
                        'propertyName' => 'name',
                        'operator' => 'HAS_PROPERTY'
                    ],
                    [
                        'propertyName' => 'date',
                        'operator' => 'EQ',
                        'value' => 1000
                    ]
                ]
            ],
            [
                'filters' => [
                    [
                        'propertyName' => 'name2',
                        'operator' => 'EQ',
                        'value' => 'lorem'
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterHas('id')
            ->filterGroup(function ($builder) {
                $builder->filterHas('name');
                $builder->filterEqual('date', 1000);
            })->filterGroup(function ($builder) {
                $builder->filterEqual('name2', 'lorem');
            });

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterLessIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'LT',
                        'value' => 1000
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterLess('number', 1000);

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterGreaterIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'GT',
                        'value' => 1000
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterGreater('number', 1000);

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterGreaterOrEqualIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'GTE',
                        'value' => 1000
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterGreaterOrEqual('number', 1000);

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterLessOrEqualIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'LTE',
                        'value' => 1000
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterLessOrEqual('number', 1000);

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterNotEqualIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'property',
                        'operator' => 'NEQ',
                        'value' => 'value'
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterNotEqual('property', 'value');

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterBetweenIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'BETWEEN',
                        'value' => 1000,
                        'highValue' => 2000
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterBetween('number', 1000, 2000);

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterInIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'IN',
                        'values' => [1,2,3]
                    ],
                    [
                        'propertyName' => 'name',
                        'operator' => 'HAS_PROPERTY'
                    ]
                ]
            ]

        ];

        $requestBody = HubspotSearchBody::filterIn('number', [1,2,3])
            ->filterHas('name');

            
        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterNotInIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'number',
                        'operator' => 'NOT_IN',
                        'values' => [1,2,3]
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterNotIn('number', [1,2,3]);

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterContainsIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'property',
                        'operator' => 'CONTAINS_TOKEN',
                        'value' => '*@teste'
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterContains('property', '*@teste');

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }

    public function testIfFilterNotContainsIsCorrect()
    {
        $filter = [
            [
                'filters' => [
                    [
                        'propertyName' => 'property',
                        'operator' => 'NOT_CONTAINS_TOKEN',
                        'value' => '*@teste'
                    ]
                ]
            ]
        ];

        $requestBody = HubspotSearchBody::filterNotContains('property', '*@teste');

        $this->template['filterGroups'] = $filter;

        $this->assertEquals($this->template, $requestBody->get());
    }
}
