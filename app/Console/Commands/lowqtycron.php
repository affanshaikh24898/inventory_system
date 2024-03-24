<?php

namespace App\Console\Commands;

use Illuminate\Console\Command; 
use App\Helpers\CommonFunction;

class lowqtycron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lowqty:cron';

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
        CommonFunction::lowQty();

        return Command::SUCCESS;
    }
}
