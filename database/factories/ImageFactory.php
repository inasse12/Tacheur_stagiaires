<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [
            'path' => $this->faker->imageUrl(),
            'imageable_type' => Service::class,
            'imageable_id' => Service::factory(),
        ];
    }
}
