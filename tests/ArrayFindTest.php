<?php

use PHPUnit\Framework\TestCase;

class ArrayFindTest extends TestCase
{
    protected $states;

    protected $statesObject;

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

        $this->statesObject = [
            (object) [
                'state'  => 'IN',
                'city'   => 'Indianapolis',
                'object' => 'School bus',
            ],
            (object) [
                'state'  => 'IN',
                'city'   => 'Indianapolis',
                'object' => 'Manhole',
            ],
            (object) [
                'state'  => 'IN',
                'city'   => 'Plainfield',
                'object' => 'Basketball',
            ],
            (object) [
                'state'  => 'CA',
                'city'   => 'San Diego',
                'object' => 'Light bulb',
            ],
            (object) [
                'state'  => 'CA',
                'city'   => 'Mountain View',
                'object' => 'Space pen',
            ],
        ];
    }

    public function testFindInArrayOfArrays()
    {
        $expected = [
            'state'  => 'CA',
            'city'   => 'Mountain View',
            'object' => 'Space pen',
        ];

        $this->assertEquals(
            $expected,
            array_find($this->states, function ($state) {
                return $state['city'] === 'Mountain View';
            })
        );
    }

    public function testFindInArrayOgObjects()
    {
        $expected = (object) [
            'state'  => 'CA',
            'city'   => 'San Diego',
            'object' => 'Light bulb',
        ];

        $this->assertEquals(
            $expected,
            array_find($this->statesObject, function ($state) {
                return $state->city === 'San Diego';
            })
        );
    }

    public function testFindNull()
    {
        $this->assertEquals(
            null,
            array_find($this->statesObject, function ($state) {
                return $state->city === 'Tomsk';
            })
        );
    }

    /**
     * @expectedException \TypeError
     */
    public function testArrayError()
    {
        array_find('some string', function ($element) {
            return true;
        });
    }

    /**
     * @expectedException \TypeError
     */
    public function testCallbackError()
    {
        array_find([], 'country');
    }
}
