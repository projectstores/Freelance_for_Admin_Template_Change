<?php

namespace App\Utils\Uploader;

use DB;
use Image;
use App\Models\FileManager;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ImageUploader
{

    private static $image;
    private $folder;
    private static $extension = 'webp';

    /**
     * Initialize image maker
     *
     * @param object $image
     * @return object
     */
    static function make($image)
    {
        // Make image
        $img             = Image::make($image);

        // Set selected image
        self::$image     = $img;
        
        // Return this
        return new self;
    }


    /**
     * Set folder to upload this image
     *
     * @param string $folder
     * @return object
     */
    public function folder($folder)
    {
        // Check if class exists
        $path = public_path("storage/$folder");
   
        // Create this folder if not exists
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0755, true, true);
        }

        // Set folder
        $this->folder = $folder;

        // Return this class
        return $this;
    }


    /**
     * Set image width
     *
     * @param integer $width
     * @return object
     */
    public function resize($width, $height = null)
    {
        // Get selected image
        $image = ImageUploader::$image;

        // Resize image
        $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        // Return this
        return $this;
    }


    /**
     * Set default extension
     *
     * @param string $extension
     * @return void
     */
    public function extension($extension)
    {
        self::$extension = $extension;
        return $this;
    }


    /**
     * Delete old file by id
     *
     * @param integer $id
     * @return object
     */
    public function deleteById($id)
    {
        try {
            
            Schema::disableForeignKeyConstraints();
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');

            // Get file from file manager
            $file = FileManager::where('id', $id)->first();

            // Check if file exists
            if ($file) {
                
                // Get file local path
                $path = public_path("storage/$file->file_folder/$file->uid.$file->file_extension");

                // Check if file exists
                if (File::exists($path)) {
                    File::delete($path);
                }

                // Now delete from database
                $file->delete();

            }

            Schema::enableForeignKeyConstraints();
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');

            return $this;

        } catch (\Throwable $th) {
            return $this;
        }
        
    }


    /**
     * Upload selected file
     *
     * @return integer
     */
    public function handle()
    {
        // Get image
        $image                = ImageUploader::$image;

        // Generate unique file id
        $uid                  = uid();

        // Generate file name
        $name                 = $uid . "." . self::$extension;

        // Get mime type
        $mime                 = $image->mime();

        // Set path
        $path                 = public_path("storage/$this->folder/$name");

        // Save image in local storage
        $image->save($path, 80, self::$extension);

        // Get uploaded file size
        $size                 = File::size($path);

        // Save file
        $file                 = new FileManager();
        $file->uid            = $uid;
        $file->file_folder    = $this->folder;
        $file->file_size      = $size;
        $file->file_mimetype  = $mime;
        $file->file_extension = self::$extension;
        $file->save();

        // Return file id
        return $file->id;
    }

    /**
     * Save image from url
     *
     * @param string $url
     * @return integer
     */
    public static function fromUrl($url, $folder)
    {
        
        try {
            
            // Get image contents
            $contents             = file_get_contents($url);

            // Generate unique file id
            $uid                  = uid();

            // Generate file name
            $name                 = "$uid.jpg";

            // Get mime type
            $mime                 = 'image/jpeg';

            // Set path
            $path                 = public_path("storage/$folder/$name");

            // Save image in local storage
            Storage::disk('custom')->put("$folder/$name", $contents);

            // Get uploaded file size
            $size                 = File::size($path);

            // Save file
            $file                 = new FileManager();
            $file->uid            = $uid;
            $file->file_folder    = $folder;
            $file->file_size      = $size;
            $file->file_mimetype  = $mime;
            $file->file_extension = "jpg";
            $file->save();

            // Return file id
            return $file->id;

        } catch (\Throwable $th) {
            return null;
        }
        
    }

}