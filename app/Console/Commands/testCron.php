<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
class testCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:cron';

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
        // return Command::SUCCESS;
        $data = ['data'=>'cron Testing'];
        Mail::send('cronMail',$data,function($message){
            $message->to("shyamkumbhar20@gmail.com")->subject('Cron Job Test');
        });
    }
}
