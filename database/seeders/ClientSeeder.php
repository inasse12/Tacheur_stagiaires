<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::where('role', 'Client')->get();

        Client::factory(4)->make()->each(function($client)use($users){
            $client->user_id = $users->random()->id;
            $client->save();
        });

    }
}
