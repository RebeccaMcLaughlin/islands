<?php

namespace Tests\Unit;

use App\Services\Islands\IslandGenerator;
use PHPUnit\Framework\TestCase;

class IslandGeneratorArrayTest extends TestCase
{
    /**
     * Test the array returned from IslandGenerator is a 5x5 grid
     *
     * @return void
     */
    public function test_array_is_5_by_5()
    {
        $generator = new IslandGenerator();
        $array = $generator->generateArray();

        foreach ($array as $row) {
            $this->assertEquals(5, count($row));
        }

        $this->assertEquals(5, count($array));
    }
}
