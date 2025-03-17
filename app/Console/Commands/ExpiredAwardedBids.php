<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\ProjectBid;
use Illuminate\Console\Command;

class ExpiredAwardedBids extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:bids';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking for expired awarded bids after 36 hours.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            
            // Get awarded bids, but not accepted yet
            $awarded_bids = ProjectBid::where('is_awarded', true)
                                        ->where('is_freelancer_accepted', false)
                                        ->where('status', 'active')
                                        ->whereNotNull('awarded_date')
                                        ->with('project')
                                        ->get();

            // Loop through bids
            foreach ($awarded_bids as $bid) {
                
                // Get awarded date
                $awarded_date = $bid->awarded_date;

                // Set expiry date
                $expiry_date  = Carbon::createFromDate($awarded_date)->addHours(36);
                
                // Check if expired
                if (!$expiry_date->isFuture()) {
                    
                    // Update bid
                    $bid->awarded_date                   = null;
                    $bid->is_awarded                     = false;
                    $bid->save();

                    // Update project
                    $bid->project->awarded_bid_id        = null;
                    $bid->project->awarded_freelancer_id = null;
                    $bid->project->save();

                }

            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
