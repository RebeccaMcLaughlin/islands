<?php

namespace App\Console\Commands\Islands;

use Illuminate\Console\Command;
use App\Services\Islands\IslandGenerator;

class Island extends Command
{
    protected $islandGenerator;

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
        foreach ($array as $arr) {
            $this->line($arr);
        }
        return $array;
    }
}
