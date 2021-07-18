<?php

namespace App\Http\Controllers;

use App\Services\Islands\IslandChecker;
use App\Services\Islands\IslandGenerator;

class IslandController extends Controller
{
    public function __construct(IslandGenerator $islandGenerator)
    {
        $this->islandGenerator = $islandGenerator;
    }

    public function index()
    {
        $array = $this->islandGenerator->generateArray();

        $islandCount = new IslandChecker($array);

        $arrayRows = [];

        foreach ($array as $key => $row) {
            $arrayRows[$key] = implode(",", $row);
        }

        $output = [
            'array' => $array,
            'map' => $arrayRows,
            'islandsCount' => $islandCount->numberOfIslands()
        ];

        return response()->json($output, 200, [], JSON_PRETTY_PRINT);
    }
}
