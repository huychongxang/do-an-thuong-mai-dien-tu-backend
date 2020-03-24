<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 24-Feb-20
 * Time: 3:51 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Image;

class BaseModel extends Model
{

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    protected function uploadFile($_attributeName, $_disk = 'store', $_destinationPath, $_value, $_saveWithFullPath = true)
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

}
