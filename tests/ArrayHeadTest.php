<?php

use PHPUnit\Framework\TestCase;

class ArrayHeadTest extends TestCase
{
    protected $states;

    protected $statesWithKeys;

    protected $emptyStates;

    public function setUp()
    {
        $this->states = [
            [
                'state'  => 'IN',
                'city'   => 'Indianapolis',
                'object' => 'School bus',
            ],
            [
                'state'  => 'IN',
                'city'   => 'Indianapolis',
                'object' => 'Manhole',
            ],
            [
                'state'  => 'IN',
                'city'   => 'Plainfield',
                'object' => 'Basketball',
            ],
            [
                'state'  => 'CA',
                'city'   => 'San Diego',
                'object' => 'Light bulb',
            ],
            [
                'state'  => 'CA',
                'city'   => 'Mountain View',
                'object' => 'Space pen',
            ],
        ];

        $this->statesWithKeys = [
            'in1' => [
                'state'  => 'IN',
                'city'   => 'Indianapolis',
                'object' => 'School bus',
            ],
            'in2' => [
                'state'  => 'IN',
                'city'   => 'Indianapolis',
                'object' => 'Manhole',
            ],
            'in3' => [
                'state'  => 'IN',
                'city'   => 'Plainfield',
                'object' => 'Basketball',
            ],
            'ca-1' => [
                'state'  => 'CA',
                'city'   => 'San Diego',
                'object' => 'Light bulb',
            ],
            'ca-2' => [
                'state'  => 'CA',
                'city'   => 'Mountain View',
                'object' => 'Space pen',
            ],
        ];

        $this->emptyStates = [];
    }

    public function testHeadOfArray()
    {
        $expected = [
            'state'  => 'IN',
            'city'   => 'Indianapolis',
            'object' => 'School bus',
        ];

        $this->assertEquals(
            $expected,
            array_head($this->states)
        );
    }

    public function testHeadOfArrayWithKeys()
    {
        $expected = [
            'state'  => 'IN',
            'city'   => 'Indianapolis',
            'object' => 'School bus',
        ];

        $this->assertEquals(
            $expected,
            array_head($this->statesWithKeys)
        );
    }

    public function testHeadOfEmptyArray()
    {
        $expected = null;

        $this->assertEquals(
            $expected,
            array_head($this->emptyStates)
        );
    }

    /**
     * @expectedException \TypeError
     */
    public function testArrayError()
    {
        array_head('some string');
    }
}
