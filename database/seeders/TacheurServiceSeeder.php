<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Tacheur;
use App\Models\TacheurService;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TacheurServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = Service::all();
        $tacheur = Tacheur::all();

        TacheurService::factory(4)->make()->each(function($tacheurService)use($service, $tacheur){
            $tacheurService->service_id = $service->random()->id;
            $tacheurService->tacheur_id = $tacheur->random()->id;
            $tacheurService->Task_Location = fake()->address;
            $tacheurService->save();
        });

    }
}
