<?php

namespace App\Http\Validators\Admin\Gigs\Edit;

use Illuminate\Support\Facades\Validator;

class GalleryValidator
{
    
    /**
     * Validate all form
     *
     * @param object $request
     * @return void
     */
    static function all($request)
    {
        try {
            
            // Get publish settings
            $settings          = settings('publish');

            // Get maximum image size
            $max_image_size    = $settings->max_image_size * 1024;

            // Get maximum images per gig
            $max_images        = $settings->max_images;

            // Get maximum documents allowed
            $max_documents     = $settings->max_documents;

            $max_document_size = $settings->max_document_size * 1024;

            // Set rules
            $rules    = [
                'thumbnail'   => 'nullable|image|mimes:jpg,jpeg,png',
                'images'      => "nullable|array|max:$max_images",
                'images.*'    => "nullable|image|mimes:jpeg,jpg,png|max:$max_image_size",
                'documents'   => "nullable|array|max:$max_documents",
                'documents.*' => "nullable|mimetypes:application/pdf|mimes:pdf|max:$max_document_size"
            ];

            // Set inputs
            $inputs   = [
                'thumbnail' => $request->thumbnail,
                'images'    => $request->images,
                'documents' => $request->documents,
            ];

            // Set messages
            $messages = [
                'thumbnail.image'       => __('messages.t_validator_image'),
                'thumbnail.mimes'       => __('messages.t_validator_mimes'),
                'images.array'          => __('messages.t_validator_array'),
                'images.max'            => __('messages.t_validator_max_array', ['max' => $max_images]),
                'images.*.image'        => __('messages.t_validator_image'),
                'images.*.mimes'        => __('messages.t_validator_mimes'),
                'images.*.max'          => __('messages.t_validator_max_size', ['max' => human_filesize($max_image_size)]),
                'documents.array'       => __('messages.t_validator_array'),
                'documents.max'         => __('messages.t_validator_max_array', ['max' => $max_documents]),
                'documents.*.mimetypes' => __('messages.t_validator_mimes'),
                'documents.*.mimes'     => __('messages.t_validator_mimes'),
                'documents.*.max'       => __('messages.t_validator_max_size', ['max' => human_filesize($max_document_size)]),
            ];

            // Validate data
            Validator::make($inputs, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
