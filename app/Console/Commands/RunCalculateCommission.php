<?php

namespace App\Console\Commands;

use App\Services\CommissionService;
use Illuminate\Console\Command;

class RunCalculateCommission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Running calculate commission service';

    private $service;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CommissionService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = $this->service->process();
        foreach ($result as $item){
            echo round_cm($item) . PHP_EOL;
        }
    }
}
