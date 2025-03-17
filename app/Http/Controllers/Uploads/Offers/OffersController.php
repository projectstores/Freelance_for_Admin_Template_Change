<?php
 
namespace App\Http\Controllers\Uploads\Offers;
 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\CustomOfferAttachment;
use App\Models\CustomOfferWork;

class OffersController extends Controller
{
   
    /**
     * Download offer attachment
     *
     * @param string $file
     * @return mixed
     */
    public function attachment($file)
    {
        try {
            
            // Explode this file string
            $parts      = explode('.', $file);

            // Set uid
            $uid        = $parts[0];

            // Get file extension
            $extension  = $parts[1];

            // Get user id
            $user_id    = auth()->id();

            // Get attachment
            $attachment = CustomOfferAttachment::where('uid', $uid)
                                                ->where('file_extension', $extension)
                                                ->whereHas('offer')
                                                ->with('offer')
                                                ->firstOrFail();

            // Check if admin connected
            if (auth('admin')->check() || $user_id === $attachment->offer->freelancer_id || $user_id === $attachment->offer->buyer_id) {
                
                // Get file path
                $path = public_path('storage/offers-attachments/' . $file);

                // Check if file exists
                if (File::exists($path)) {
                    
                    // Download file
                    return response()->download($path, $file, ['Content-Type' => $attachment->file_mime]);

                } else {

                    // File not found
                    return abort(404);

                }

            } else {

                // No permissions to download this file
                return abort(404);

            }

        } catch (\Throwable $th) {
            abort(404);
        }
    }


    /**
     * Download offer finished work
     *
     * @param string $file
     * @return mixed
     */
    public function work($file)
    {
        try {
            
            // Explode this file string
            $parts      = explode('.', $file);

            // Set uid
            $uid        = $parts[0];

            // Get file extension
            $extension  = $parts[1];

            // Get user id
            $user_id    = auth()->id();

            // Get attachment
            $attachment = CustomOfferWork::where('uid', $uid)
                                        ->where('file_extension', $extension)
                                        ->whereHas('offer')
                                        ->with('offer')
                                        ->firstOrFail();

            // Check if admin connected
            if (auth('admin')->check() || $user_id === $attachment->offer->freelancer_id || $user_id === $attachment->offer->buyer_id) {
                
                // Get file path
                $path = public_path('storage/offers-work/' . $file);

                // Check if file exists
                if (File::exists($path)) {
                    
                    // Download file
                    return response()->download($path, $file, ['Content-Type' => $attachment->file_mime]);

                } else {

                    // File not found
                    return abort(404);

                }

            } else {

                // No permissions to download this file
                return abort(404);

            }

        } catch (\Throwable $th) {
            abort(404);
        }
    }

}