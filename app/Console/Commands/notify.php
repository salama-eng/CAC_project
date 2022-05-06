<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Auction;
class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:endAuctions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'End date auction';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $auction = Auction::with(['auction_post', 'userOwner', 'userAw'])
                            ->where('auction_post.end_date', '<', date('Y-m-d'))
                            ->get();
        return 0;
    }
}
