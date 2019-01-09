<?php

namespace App\Services;

use Faker\Factory as Faker;

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
        $faker= Faker::create();
        $fileName = $faker->uuid . '_' . $image->getClientOriginalName();
        $image->move('storage/avatar', $fileName);
        return $fileName;
    }
}
