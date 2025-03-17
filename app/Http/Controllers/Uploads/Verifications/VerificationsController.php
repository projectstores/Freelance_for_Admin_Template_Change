<?php
 
namespace App\Http\Controllers\Uploads\Verifications;
 
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Models\OrderItemRequirement;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\OrderItemWork;
use App\Models\VerificationCenter;

class VerificationsController extends Controller
{
   
    /**
     * Download verification file
     *
     * @param string $id
     * @param string $type
     * @param integer $fileId
     * @return mixed
     */
    public function download($id, $type, $fileId)
    {
        try {

            // Check type
            if (!in_array($type, ['front', 'back', 'selfie'])) {
                abort(404);
            }

            // Set where close
            switch ($type) {
                case 'front':
                    $where = "file_front_side";
                    break;

                case 'back':
                    $where = "file_back_side";
                    break;

                case 'selfie':
                    $where = "file_selfie";
                    break;
            }

            // Get verification
            $verification = VerificationCenter::where('uid', $id)->where($where, $fileId)->firstOrFail();

            if (auth('admin')->check()) {
                
                // Front side
                if ($type === 'front') {
                    
                    // Get file path
                    $path = public_path( 'storage/verifications/' . $verification->frontside->uid . '.' . $verification->frontside->file_extension );

                    // Check if file exists
                    if (File::exists($path)) {
                        return response(file_get_contents($path), 200)->header('Content-Type', File::mimeType($path));
                    }
        
                    // Not found
                    abort(404);

                } else if ($type === 'back') {
                    
                    // Get file path
                    $path = public_path( 'storage/verifications/' . $verification->backside->uid . '.' . $verification->backside->file_extension );

                    // Check if file exists
                    if (File::exists($path)) {
                        return response(file_get_contents($path), 200)->header('Content-Type', File::mimeType($path));
                    }
        
                    // Not found
                    abort(404);

                } else if ($type === 'selfie') {
                    
                    // Get file path
                    $path = public_path( 'storage/verifications/' . $verification->selfie->uid . '.' . $verification->selfie->file_extension );

                    // Check if file exists
                    if (File::exists($path)) {
                        return response(file_get_contents($path), 200)->header('Content-Type', File::mimeType($path));
                    }
        
                    // Not found
                    abort(404);

                } else {
                    abort(404);
                }
                
            } else if (auth()->check()) {
                
                // Get user id
                $user_id = auth()->id();

                // Check if guest has permission to see this file
                if ($verification->user_id !== $user_id) {
                    abort(404);
                }

                // Front side
                if ($type === 'front') {
                    
                    // Get file path
                    $path = public_path( 'storage/verifications/' . $verification->frontside->uid . '.' . $verification->frontside->file_extension );

                    // Check if file exists
                    if (File::exists($path)) {
                        return response(file_get_contents($path), 200)->header('Content-Type', File::mimeType($path));
                    }
        
                    // Not found
                    abort(404);

                } else if ($type === 'back') {
                    
                    // Get file path
                    $path = public_path( 'storage/verifications/' . $verification->backside->uid . '.' . $verification->backside->file_extension );

                    // Check if file exists
                    if (File::exists($path)) {
                        return response(file_get_contents($path), 200)->header('Content-Type', File::mimeType($path));
                    }
        
                    // Not found
                    abort(404);

                } else if ($type === 'selfie') {
                    
                    // Get file path
                    $path = public_path( 'storage/verifications/' . $verification->selfie->uid . '.' . $verification->selfie->file_extension );

                    // Check if file exists
                    if (File::exists($path)) {
                        return response(file_get_contents($path), 200)->header('Content-Type', File::mimeType($path));
                    }
        
                    // Not found
                    abort(404);

                } else {
                    abort(404);
                }

            } else {

                // Not login
                abort(404);

            }

        } catch (\Throwable $th) {
            abort(404);
        }
    }

}