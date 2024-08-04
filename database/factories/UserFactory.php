<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'Admin',
            ];
        });
    }

    public function client()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'Client',
            ];
        });
    }

    public function tacheur()
    {
        return $this->state(function (array $attributes) {
            return [
                'role' => 'Tacheur',
            ];
        });
    }


    public function definition()
    {
        return [
            'nom' => fake()->name(),
            'prenom' => fake()->name(),
            'telephone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'role' => fake()->randomElement(['Admin', 'Client', 'Tacheur']),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
