<?php

namespace Database\Seeders;

use App\Models\Tacheur;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TacheurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::where('role', 'Tacheur')->get();

        Tacheur::factory(4)->make()->each(function($tacheur)use($users){
            $tacheur->user_id = $users->random()->id;
            $tacheur->save();
        });
        
    }
}
