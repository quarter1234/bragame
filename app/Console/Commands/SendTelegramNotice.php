<?php

namespace App\Console\Commands;

use App\Common\Lib\TelegramNotice;
use App\Events\RegisterEvent;
use App\Models\User;
use Illuminate\Console\Command;

class SendTelegramNotice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_telegram_notice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send telegram notice';

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
     * @return int
     */
    public function handle()
    {
        $inviteCode = 'KJGFP1FK';
        $register = User::find(57215);
        event(new RegisterEvent($register, $inviteCode));
        print_r($inviteCode);die();
        // TelegramNotice::sendMessage("test");
    }
}
