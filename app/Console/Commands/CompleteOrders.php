<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Console\Command;

class CompleteOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:complete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Complete incompleted order items';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get orders items
        $items = OrderItem::where('status', 'delivered')
                            ->where('is_finished', false)
                            ->where('delivered_at', '>=', now()->subWeeks(2))
                            ->whereDoesntHave('refund', function($query) {
                                return $query->whereNotIn('status', ['pending', 'rejected_by_seller']);
                            })
                            ->get();

        // Loop through items
        foreach ($items as $item) {
            
            // We have to give seller his money
            User::where('id', $item->owner_id)->update([
                'balance_pending'   => convertToNumber($item->owner->balance_pending) - convertToNumber($item->profit_value),
                'balance_available' => convertToNumber($item->owner->balance_available) + convertToNumber($item->profit_value),
            ]);

            // Remove item from queue list and success sales
            if ($item->gig->total_orders_in_queue() > 0) {
                $item->gig()->decrement('orders_in_queue');
            }

            $item->gig()->increment('counter_sales');

            // Update item
            $item->is_finished = true;
            $item->save();

        }
    }
}
