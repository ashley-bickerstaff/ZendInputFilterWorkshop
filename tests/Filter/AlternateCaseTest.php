<?php
/**
 * Description
 */

namespace ZendInputFilterWorkshop\Filter;

use PHPUnit\Framework\TestCase;

class AlternateCaseTest extends TestCase
{

    /**
     * @param $input
     * @param $expected
     * @param $startWithUpper
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
            ]
        ];
    }

}