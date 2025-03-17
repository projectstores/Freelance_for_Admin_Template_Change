<?php
 
namespace App\Http\Controllers\Uploads\Documents;
 
use App\Http\Controllers\Controller;
use App\Models\GigDocument;
use Illuminate\Support\Facades\File;

class DocumentController extends Controller
{
   
    public function download($id)
    {
        try {
            
            // Check if document exists
            $document = GigDocument::where('uid', $id)->firstOrFail();

            // Get document path
            $path     = public_path("storage/gigs/documents/$document->uid.pdf");

            // Check if file exists
            if (File::exists($path)) {
                return response()->download($path, $document->name, []);
            }

            // Not found
            abort(404);

        } catch (\Throwable $th) {
            abort(404);
        }
    }

}