<?php

namespace App\Services\Islands;

class IslandGenerator
{
    /**
     * Generate array of random 0 and 1s
     *
     * @return array
     */
    public function generateArray(): array
    {
        $array = [];

        for ($row = 0; $row < 5; $row++) {
            $cols = [];

            for ($c = 0; $c < 5; $c++) {
                $cols[$c] = rand(0, 1);
            }

            $array[$row] = $cols;
        }

        return $array;
    }
}
