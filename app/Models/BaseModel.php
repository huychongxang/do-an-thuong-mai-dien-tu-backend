<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24-Feb-20
 * Time: 3:51 PM
 */

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class BaseModel extends Model
{

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    protected function uploadImageBase64($_attributeName, $_disk = 'store', $_destinationPath, $_value, $_saveWithFullPath = true)
    {
        $attributeName = $_attributeName;
        $disk = $_disk;
        $destinationPath = $_destinationPath;

        // if the image was erased
        if ($_value == null) {
            // set null in the database column
            $this->attributes[$attributeName] = null;
        }

        // if a base64 was sent, store it in the db
        if (Str::startsWith($_value, 'data:image')) {
            // 0. Make the image
            $image = Image::make($_value)->encode('jpg', 90);
            // 1. Generate a filename.
            $filename = md5($_value . time()) . '.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destinationPath . '/' . $filename, $image->stream());
            // 3. Save the name image to the database
            if ($_saveWithFullPath) {
                $this->attributes[$attributeName] = $destinationPath . '/' . $filename;
            } else {
                $this->attributes[$attributeName] = $filename;
            }
        }
    }

    public function uploadFile($_attributeName, $_disk = 'store', $_destinationPath, $_value, $_saveWithFullPath = true)
    {
        // if the file input is empty
        if (is_null($_value) && $this->{$attribute_name} != null) {
            $this->attributes[$attribute_name] = null;
            return;
        }
        $request = \Request::instance();
        // if a new file is uploaded, store it on disk and its filename in the database
        if ($request->hasFile($_attributeName) && $request->file($_attributeName)->isValid()) {
            // 1. Generate a new file name
            $file = $request->file($_attributeName);
            $new_file_name = md5($file->getClientOriginalName() . time()) . '.' . $file->getClientOriginalExtension();

            // 2. Move the new file to the correct path
            Storage::disk($_disk)->putFileAs($_destinationPath, $file, $new_file_name);
            // 3. Save the complete path to the database
            if ($_saveWithFullPath) {
                $this->attributes[$_attributeName] = $_destinationPath . '/' . $new_file_name;
            } else {
                $this->attributes[$_attributeName] = $new_file_name;
            }
        }
    }

}
