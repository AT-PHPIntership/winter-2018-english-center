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

    /**
     * Upload images
     *
     *  @param object $image image
     *
     *  @return $fileName
     */
    public function uploadImageLesson($image)
    {
        $faker= Faker::create();
        $fileName = $faker->uuid . '_' . $image->getClientOriginalName();
        $image->move('storage/lesson', $fileName);
        return $fileName;
    }

    /**
     * Upload images
     *
     *  @param object $image image
     *
     *  @return $fileName
     */
    public function uploadImageSlider($image)
    {
        $faker= Faker::create();
        $fileName = $faker->uuid . '_' . $image->getClientOriginalName();
        $image->move('storage/slider', $fileName);
        return $fileName;
    }

    /**
     * Upload images courses
     *
     *  @param object $image image
     *
     *  @return $fileName
     */
    public function uploadImageCourse($image)
    {
        $faker = Faker::create();
        $fileName = $faker->uuid . '_' . $image->getClientOriginalName();
        $image->move('front_end/img/event', $fileName);
        return $fileName;
    }
}
