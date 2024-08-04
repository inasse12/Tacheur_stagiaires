<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::factory(2)->admin()->create();
        User::factory(4)->client()->create();
        User::factory(4)->tacheur()->create();
    }
}
