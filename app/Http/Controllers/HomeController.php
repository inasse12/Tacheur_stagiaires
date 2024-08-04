<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Tacheur;
use App\Models\TacheurService;
use App\Models\Travail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $trservices = Service::limit(3)->get();
        $srservices = Service::limit(8)->get();
        $services = Service::select('id', 'nom')->get();

        return view('welcome', compact('trservices', 'srservices', 'services'));
    }
    public function dashboard()
    {
        if (Auth()->user()->role == 'Client') {
            $services = Service::get()->take(4);
            return view('dashboard', compact('services'));
        }

        elseif(Auth()->user()->role == 'Tacheur'){
            $totalSolde = Tacheur::where('id', auth()->user()->tacheur->id)->sum('solde');
            $todaySolde = Tacheur::where('id', auth()->user()->tacheur->id)
                    ->whereDate('created_at', today())
                    ->sum('solde');

            $tacheurservicesid = TacheurService::where('tacheur_id', Auth()->user()->tacheur->id)->pluck('id');
            $servicesCount = Travail::whereNotNull('finTravail')->where('tacheur_service_id', $tacheurservicesid)->count();

            $servicesIds = TacheurService::where('tacheur_id', Auth()->user()->tacheur->id)->pluck('service_id');
            $tonservice = TacheurService::with('service')->where('service_id', $servicesIds)->first();

            $travails = Travail::whereIn('tacheur_service_id', $tacheurservicesid)->get();

            return view('dashboard', compact(['totalSolde','todaySolde','servicesCount','tonservice','travails']));
        }
        else{
            $services = Service::get()->take(4);
            return view('dashboard', compact('services'));
        }
    }

    public function message()
    {
        return view('message.index');
    }
}
