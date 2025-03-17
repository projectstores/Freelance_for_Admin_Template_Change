<?php

namespace App\Http\Middleware;

use App\Models\Level;
use App\Models\Order;
use Cache;
use Closure;
use Illuminate\Http\Request;

class UpgradeLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user authenticated
        if (auth()->check() && auth('admin')->guest()) {

            // Check if already checked
            if (Cache::has('upgrade_level_check_' . auth()->user()->uid)) {
                // Continue request
                return $next($request);
            }
            
            // Check if seller account
            if (auth()->user()->account_type === 'seller') {
                
                // Get user current level
                $level       = auth()->user()?->level;

                // Get seller sales
                $total_sales = auth()->user()->sales->where('status', 'delivered')->where('is_finished', true)->count();

                // Get new level
                $new_level   = Level::where('account_type', 'seller')
                                    ->where(function ($query) use ($total_sales) {
                                        return $query->where('seller_sales_min', '>=', $total_sales)
                                                     ->where('seller_sales_max', '<=', $total_sales);
                                    })
                                    ->orderByDesc('id')
                                    ->first();

                // Check if there is any new level
                if ($new_level && $new_level->id !== $level->id) {
                    
                    // Update user level
                    auth()->user()->level_id = $new_level->id;
                    auth()->user()->save();

                }

                // Set a cache key to prevent multiple sql queires
                Cache::put('upgrade_level_check_' . auth()->user()->uid, true, 86400);

            } else {

                // Get user current level
                $level           = auth()->user()?->level;

                // Get buyer purchases
                $total_purchases = Order::where('buyer_id', auth()->id())->count();

                // Get new level
                $new_level       = Level::where('account_type', 'buyer')
                                        ->where(function ($query) use ($total_purchases) {
                                            return $query->where('buyer_purchases_min', '>=', $total_purchases)
                                                         ->where('buyer_purchases_max', '<=', $total_purchases);
                                        })
                                        ->orderByDesc('id')
                                        ->first();

                // Check if there is any new level
                if ($new_level && $new_level->id !== $level->id) {
                    
                    // Update user level
                    auth()->user()->level_id = $new_level->id;
                    auth()->user()->save();

                }

                // Set a cache key to prevent multiple sql queires
                Cache::put('upgrade_level_check_' . auth()->user()->uid, true, 86400);

            }

        }

        // Continue request
        return $next($request);
    }
}
