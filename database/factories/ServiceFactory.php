<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'description' => $this->faker->address,
        ];
    }
    
    public function configure()
    {
        return $this->afterCreating(function (Service $service) {
            $imagePath = Storage::putFile('public/services', UploadedFile::fake()->image('image.jpg'));
            $image = Image::factory()->create([
                'path' => $imagePath,
                'imageable_type' => Service::class,
                'imageable_id' => $service->id,
            ]);
            $service->images()->save($image);
        });
    }
}
