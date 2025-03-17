<?php
 
namespace App\Http\Controllers\Uploads\Requirements;
 
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\OrderItemRequirement;
use App\Models\OrderItem;
use App\Models\Order;

class RequirementsController extends Controller
{
   
    /**
     * Download required file
     *
     * @param string $orderId
     * @param string $itemId
     * @param integer $reqId
     * @param string $fileId
     * @return mixed
     */
    public function download($orderId, $itemId, $reqId, $fileId)
    {
        try {
            
            // Get user id
            $user_id = auth()->id();

            // Get order id
            $order = Order::where('uid', $orderId)->firstOrFail();

            // Get item in order
            $item = OrderItem::where('uid', $itemId)->firstOrFail();

            // Now only buyer, seller or admins can access this file
            if ($order->buyer_id == $user_id || $item->owner_id == $user_id) {

                // Get requirement
                $requirement = OrderItemRequirement::where('item_id', $item->id)->where('id', $reqId)->firstOrFail();

                // Type must be file
                if ($requirement->form_type !== 'file') {
                    abort(404);
                }

                // File id must match the requested file id
                if ($fileId !== $requirement->form_value['id']) {
                    abort(404);
                }

                // Get file path
                $path = public_path('storage/orders/requirements/' . $fileId . '.' . $requirement->form_value['extension']);

                // Check if file exists
                if (File::exists($path)) {
                    return response()->download($path, $fileId . '.' . $requirement->form_value['extension'], []);
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