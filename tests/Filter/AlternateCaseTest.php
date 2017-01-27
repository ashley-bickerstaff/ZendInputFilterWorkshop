<?php

namespace ZendInputFilterWorkshop\Filter;

use PHPUnit\Framework\TestCase;

/**
 * Tests for the alternate case filter
 */
class AlternateCaseTest extends TestCase
{

    /**
     * Test the filter
     *
     * @param string $input
     * @param string $expected
     * @param bool   $startWithUpper
     *
     * @return void
     *
     * @dataProvider testFilterDataProvider
     */
    public function testFilter($input, $expected, $startWithUpper)
    {
        $filter = new AlternateCase();
        $filter->setOptions(['startWithUpper' => $startWithUpper]);

        $this->assertSame($expected, $filter->filter($input));
    }

    /**
     * Data provider for the filter test
     *
     * @return array
     */
    public function testFilterDataProvider()
    {
        return [
            [
                'red',
                'ReD',
                true
            ],
            [
                'red',
                'rEd',
                false
            ],
            [
                'r3d',
                'r3D',
                false
            ],
            [
                'r3d',
                'R3d',
                true
            ]
        ];
    }
}