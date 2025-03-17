<?php
 
namespace App\Http\Controllers\Uploads\Delivered;
 
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\OrderItemRequirement;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\OrderItemWork;

class DeliveredController extends Controller
{
   
    /**
     * Download required file
     *
     * @param string $orderId
     * @param string $itemId
     * @param integer $workId
     * @param string $fileId
     * @return mixed
     */
    public function download($orderId, $itemId, $workId, $fileId)
    {
        try {
            
            // Get user id
            $user_id = auth()->id();

            // Get order id
            $order   = Order::where('uid', $orderId)->firstOrFail();

            // Get item in order
            $item    = OrderItem::where('uid', $itemId)->firstOrFail();

            // Now only buyer, seller or admins can access this file
            if ($order->buyer_id == $user_id || $item->owner_id == $user_id) {

                // Get work
                $work = OrderItemWork::where('order_item_id', $item->id)->where('id', $workId)->firstOrFail();

                // File id must match the requested file id
                if ($fileId !== $work->attached_work['id']) {
                    abort(404);
                }

                // Get file path
                $path = public_path('storage/orders/delivered_work/' . $fileId . '.' . $work->attached_work['extension']);

                // Check if file exists
                if (File::exists($path)) {
                    return response()->download($path, $fileId . '.' . $work->attached_work['extension'], []);
                }
    
                // Not found
                abort(404);

            } else {

                // No one other can access this file :)
                abort(404);

            }

        } catch (\Throwable $th) {
            abort(404);
        }
    }

}