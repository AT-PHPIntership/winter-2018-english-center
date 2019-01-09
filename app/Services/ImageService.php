<?php

namespace App\Services;

use Config\define;

class ImageService
{
    /**
     * Upload images
     *
     *  @param object $image image
     *
     *  @return $fileName
     */
    public function uploadImage($image)
    {
        $fileName = time() . '_' . $image->getClientOriginalName();
        $image->move('storage/avatar', $fileName);
        return $fileName;
    }
}
