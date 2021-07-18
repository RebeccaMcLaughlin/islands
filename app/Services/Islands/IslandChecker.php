<?php

namespace App\Services\Islands;

use Illuminate\Support\Facades\Log;

class IslandChecker
{
    public $array;

    public function __construct(array $array)
    {
        $this->array = $array;
    }

    // Perform a depth based traversal of the array
    // Determine if previous or next items in the column are 1's if the item is also a 1
    // Determine if the previous row of items in the current column are 1's.
    // No diagonal match is required
    // Mark each island as visited (An empty string or -1 should do) as we traverse the array.
    // The number of calls to dfs where an item == 1 (After DFS has combed the array and updated visited nodes) should be the resulting count of islands.

    /**
     * Check next item is in bounds and can be turned into a -1
     *
     * @return boolean
     */
    public function isInBounds(int $row, int $col): bool
    {
        if (isset($this->array[$row][$col]) && $this->array[$row][$col] === 1) {
            return true;
        }

        return false;
    }

    public function dfs(int $row, int $col): void
    {
        // For each row, check the item before, current and after
        $rowNbr = [
            -1, 0, 1
        ];

        // For each col, check the item before, current and after
        $colNbr = [
            -1, 0, 1
        ];

        // Mark as visited and continue
        $this->array[$row][$col] = -1;

        // Check neighbours
        for ($x = 0; $x < 3; ++$x) {
            Log::info($row + $rowNbr[$x]);

            if ($this->isInBounds($row + $rowNbr[$x], $col + $colNbr[$x])) {
                $this->dfs($row + $rowNbr[$x], $col + $colNbr[$x]);
            }
        }

        Log::info($this->array[$row]);
    }

    public function numberOfIslands(): int
    {
        $numberOfIslands = 0;

        // Traverse the array looking for items that have a 1
        for ($row = 0; $row < count($this->array); ++$row) {
            for ($col = 0; $col < count($this->array[$row]); ++$col) {
                if ($this->array[$row][$col] === 1) {
                    $this->dfs($row, $col);
                    $numberOfIslands++;
                }
            }
        }

        return $numberOfIslands;
    }
}
