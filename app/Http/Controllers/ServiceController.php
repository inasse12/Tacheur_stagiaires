<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\reclame;
use App\Models\Service;
use App\Models\Tacheur;
use App\Models\TacheurService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{

    public function Travail($id)
    {
        $TacheurService = TacheurService::where('service_id', $id)->first();

        $Tacheurs = TacheurService::where('service_id', $id)->get();

        return view('services.show',compact('id','TacheurService','Tacheurs'));
    }

    public function index()
    {
        $services = Service::paginate();
        $letter="";

        return view('services.index', compact('services','letter'));
        // return response()->json(['services' => $services]);
    }

  
    // Search services
    public function search(Request $request)
    {
        $services = Service::where('nom', 'LIKE', "%{$request->nom}%")->get();
        $letter=$request->nom;
        return view('services.index', compact('services','letter'));

    }

    // Search tasker who have the same ID_service
    public function showTaskers($serviceId)
    {
        $taskerIds = TacheurService::where('service_id', $serviceId)->pluck('tacheur_id');
        $Tacheurs = Tacheur::with('portfolio')->whereIn('id', $taskerIds)->get();
        return view('services.show',compact('Tacheurs'));
        // return response()->json(['Tacheurs' => $Tacheurs]);
    }

    //tasker for tacheur
    public function getTaskTacheur(Request $request)
    {
        $servicesIds = TacheurService::where('tacheur_id', $request['id'])->pluck('service_id');
        $service = Service::whereIn('id', $servicesIds)->paginate(
            request()->input('limit', $request['limit']),
            ['*'],
            'page',
            request()->input('page',  $request['page'])
        );;
        return response()->json(["services" => $service]);
    }

    //get all tacheurs
    public function AllTacheur(Request $request)
    {
        $Tacheurs = Tacheur::paginate(
            request()->input('limit', $request['limit']),
            ['*'],
            'page',
            request()->input('page',  $request['page'])
        );
        return response()->json($Tacheurs);
    }

    //get all taskers
    public function AllTask(Request $request)
    {
        $Services = Service::paginate(
            request()->input('limit', $request['limit']),
            ['*'],
            'page',
            request()->input('page',  $request['page'])
        );
        return response()->json($Services);
    }

    //task tacheur connected
    public function TaskTacheur()
    {
        $servicesIds = TacheurService::where('tacheur_id', Auth()->user()->tacheur->id)->pluck('service_id');
        $service = Service::whereIn('id', $servicesIds)->get();
        return response()->json(["services" => $service]);
    }

    public function create()
    {
        //
    }

    //reclame
    public function reclame(Request $request)
    {
        $validator = $request->validate([
            'message' => 'required',
            'user_id' => 'nullable',
            'tacheur_id' => 'nullable',
        ]);
        $validate['user_id'] = Auth()->id();
        reclame::create($validator);
        return response()->json("thank's ");
    }

    //reclame -> tacheur
    public function reclametacheur(Request $request)
    {
        $validator = $request->validate([
            'message' => 'required',
            'user_id' => 'nullable',
            'tacheur_id' => 'required',
        ]);
        $validate['user_id'] = Auth()->id();
        reclame::create($validator);
        return response()->json("thank's ");
    }

    //add service task
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nom' => "required",
            'description' => "required"
        ]);

        $service = Service::create($validate);

        if ($request->hasFile('path')) {

            $path = $request->file('path')->store('public/services');

            $service->images()->save(Image::make(['path' => $path]));
        }
        return redirect()->back()->with('success', 'Service bien ajouté.');
        // return response()->json($service);
    }

    //add taskers for him service
    public function storetasktacheur(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'tarifs' => "required",
            'Task_Location' => "required",
            'service_id' => "required",
            'tacheur_id' => "nullable",
        ]);
        $validate['tacheur_id'] = Auth()->user()->tacheur->id;
       TacheurService::create($validate);
        return redirect()->route('dashboard');
        // return response()->json($Tservice);
    }

    public function show(Service $service)
    {
        //
    }

    public function edit(Service $service)
    {
        //
    }

    public function update(Request $request, Service $service)
    {
        //
    }

    public function destroy(Service $service)
    {
        if (auth()->user()->cannot('delete', $service)) {
            return redirect()->route('services.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer ce service.');
        }
    
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service supprimé avec succès.');
    }
}
