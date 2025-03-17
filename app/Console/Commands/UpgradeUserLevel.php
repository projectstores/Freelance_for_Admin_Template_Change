<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Level;
use App\Models\Order;
use Illuminate\Console\Command;

class UpgradeUserLevel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:upgrade-user-level';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user level';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get active users
        $users = User::whereIn('status', ['active', 'verified'])
                        ->whereHas('level')
                        ->with(['level', 'sales'])
                        ->get();

        // Loop through users
        foreach ($users as $user) {
            
            // Set user level
            $user_level = $user->level;

            // Check account type
            if ($user->account_type === 'seller') {
                
                // Get user total sales
                $user_sales = $user->sales()->count();

                // Get next level
                $next_level = Level::where('account_type', 'seller')
                                    ->where('id', '!=', $user_level->id)
                                    ->where('seller_sales_min', '>=', $user_sales)
                                    ->where('seller_sales_max', '<=', $user_sales)
                                    ->latest('id')
                                    ->first();

                // Check if next level
                if ($next_level) {
                    
                    // Update user level
                    $user->level_id = $next_level->id;
                    $user->save();

                }

            } else {

                // Get user total purchases
                $user_purchases = Order::where('buyer_id', $user->id)->count();

                // Get next level
                $next_level = Level::where('account_type', 'buyer')
                                    ->where('id', '!=', $user_level->id)
                                    ->where('buyer_purchases_min', '>=', $user_purchases)
                                    ->where('buyer_purchases_max', '<=', $user_purchases)
                                    ->latest('id')
                                    ->first();

                // Check if next level
                if ($next_level) {
                    
                    // Update user level
                    $user->level_id = $next_level->id;
                    $user->save();

                }

            }

        }
    }
}
