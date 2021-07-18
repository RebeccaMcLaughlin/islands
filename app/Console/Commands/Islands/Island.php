<?php

namespace App\Console\Commands\Islands;

use App\Services\Islands\IslandChecker;
use App\Services\Islands\IslandGenerator;
use Illuminate\Console\Command;

class Island extends Command
{
    protected $islandGenerator;
    protected $islandChecker;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'island';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate 2D matrix and count the number of islands given';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(IslandGenerator $islandGenerator)
    {
        $this->islandGenerator = $islandGenerator;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line("Generating islands");

        $array = $this->islandGenerator->generateArray();

        $islandCount = new IslandChecker($array);

        $arrayRows = [];
        foreach ($array as $key => $row) {
            $arrayRows[$key] = implode(",", $row);
        }

        $output = [
            'map' => $array,
            'islandsCount' => $islandCount->numberOfIslands()
        ];

        $this->info(print_r($output));
    }
}
