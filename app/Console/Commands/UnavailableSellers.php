<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UnavailableSellers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sellers:unavailable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check unavailable seller period expiration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get sellers
        $sellers = User::where('account_type', 'seller')
                        ->whereHas('availability', function($query) {
                            return $query->where('expected_available_date', '<=', now());
                        })
                        ->get();

        // Loop through unavailable sellers
        foreach ($sellers as $seller) {
            
            // Delete unavailability
            $seller->availability->delete();

        }
    }
}
