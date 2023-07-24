<?php

namespace App\Console\Commands;

use App\Common\Lib\TelegramNotice;
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
        TelegramNotice::sendMessage();
        echo "111";die();
        return 0;
    }
}
