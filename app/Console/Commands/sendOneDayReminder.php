<?php

namespace App\Console\Commands;

use App\SMS\SendSms;
use Illuminate\Console\Command;

class sendOneDayReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:oneDayReminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'One day to reminder';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reminder=new SendSms();
        $reminder->sendOneDayRemainder();
    }
}
