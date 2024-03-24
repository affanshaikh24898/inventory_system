<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\CommonFunction;

class expireydatecron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expireydate:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        CommonFunction::expireyDate();

        return Command::SUCCESS;
    }
}
