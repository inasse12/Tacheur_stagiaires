<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {

        $users = User::where('role', 'Admin')->get();

        Admin::factory(2)->make()->each(function($admin)use($users){
            $admin->user_id = $users->random()->id;
            $admin->save();
        });

    }
}
