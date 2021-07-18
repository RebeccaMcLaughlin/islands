<?php

namespace Tests\Unit\Islands;

use App\Services\Islands\IslandChecker;
use Tests\TestCase;

class ArrayCheckerTest extends TestCase
{
    protected $array;

    public function setUp(): void
    {
        parent::setUp();

        $this->array = [
            [1, 0, 1, 1, 0],
            [1, 1, 0, 0, 0],
            [1, 1, 0, 1, 0],
            [0, 1, 0, 0, 0],
            [1, 1, 0, 0, 0]
        ];
    }

    /**
     * Assert that the checker generates the correct number of islands based on a static array.
     *
     * @return void
     */
    public function test_array_checker()
    {
        $checker = new IslandChecker($this->array);
        $this->assertEquals(3, $checker->numberOfIslands());
    }
}
