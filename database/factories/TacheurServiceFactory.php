<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TacheurService>
 */
class TacheurServiceFactory extends Factory
{
    public function definition()
    {
        return [
            'tarifs' => 0.00,
        ];
    }
}
