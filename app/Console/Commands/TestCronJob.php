<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test-cron-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing cron job';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Storage::disk('public')->append('/cron/'.today()->toDateString().'.txt', 'Cron job runs at '. now()->toDateTimeString());
        $this->info('Cron job runs at '. now()->toDateTimeString());
    }
}
