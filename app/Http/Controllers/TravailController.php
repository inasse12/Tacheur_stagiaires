<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Tacheur;
use App\Models\TacheurService;
use App\Models\Travail;
use Illuminate\Http\Request;

class TravailController extends Controller
{

    //create travail
    public function ChoixServices(Request $request)
    {
        $validate = $request->validate([
            'adresse' => "required|string ",
            'detailTache' => "required|string ",
            'startTravail' => "required|date",
            'nbr_houre' => "required|numeric",
            'user_id' => "nullable",
            'tacheur_service_id' => "required|string "
        ]);
        $validate['user_id'] = Auth()->id();

        $travail = Travail::create($validate);
        return redirect()->route('clientWorks');
        // return response()->json($travail);
    }

    //get new travail
    public function getnewTravailforTacheur()
    {
        $tacheurservicesid = TacheurService::where('tacheur_id', Auth()->user()->tacheur->id)->pluck('id');
        $travails = Travail::whereIn('tacheur_service_id', $tacheurservicesid)->where('etat', null)->get();
        return view('travails.tacheurWorks', compact('travails'));

        // return response()->json($travail);
    }

    public function getnewTravailforClient()
    {
        $travails = Travail::where('user_id', Auth()->id())->get();
            // ->where('etat', null)->get();
        return view('travails.clientWorks', compact('travails'));

        // return response()->json($travail);
    }

    //get all travail
    public function getallTravailforTacheur()
    {
        $tacheurservicesid = TacheurService::where('tacheur_id', Auth()->user()->tacheur->id)->pluck('id');
        $travails = Travail::whereIn('tacheur_service_id', $tacheurservicesid)->get();
        return view('travails.tacheurWorks', compact('travails'));

        // return response()->json($travail);
    }

    //get all travail accept
    public function acceptforTacheur()
    {
        $tacheurservicesid = TacheurService::where('tacheur_id', Auth()->user()->tacheur->id)->pluck('id');
        $travails = Travail::whereIn('tacheur_service_id', $tacheurservicesid)->where('etat', 'accept')->get();
        return view('travails.tacheurWorks', compact('travails'));

        // return response()->json($travail);
    }


    //get all travail accept
    public function refuseforTacheur()
    {
        $tacheurservicesid = TacheurService::where('tacheur_id', Auth()->user()->tacheur->id)->pluck('id');
        $travails = Travail::whereIn('tacheur_service_id', $tacheurservicesid)->where('etat', 'refuse')->get();
        return view('travails.tacheurWorks', compact('travails'));

        // return response()->json($travail);
    }

    //get all travail accept
    public function acceptforClient()
    {

        $travails = Travail::where('user_id', Auth()->user()->id)->where('etat', 'accept')->get();
        return view('travails.clientWorks', compact('travails'));

        // return response()->json($travail);
    }


    //get all travail accept
    public function refuseforClient()
    {

        $travails = Travail::where('user_id', Auth()->user()->id)->where('etat', 'refuse')->get();
        return view('travails.clientWorks', compact('travails'));

        // return response()->json($travail);
    }


    public function finishforClient()
    {

        $travails = Travail::where('user_id', Auth()->user()->id)->where('etat', 'finish')->where('finTravail', '<>', null)->get();
        return view('travails.clientWorks', compact('travails'));

        // return response()->json($travail);
    }

    public function finishfortacheur()
    {
        $tacheurservicesid = TacheurService::where('tacheur_id', Auth()->user()->tacheur->id)->pluck('id');

        $travails = Travail::whereIn('tacheur_service_id', $tacheurservicesid)->where('etat', 'finish')->where('finTravail', '<>', null)->get();
        return view('travails.tacheurWorks', compact('travails'));

        // return response()->json($travail);
    }

    public function getallTravailforClient()
    {
        $travails = Travail::where('user_id', Auth()->id())->get();
        return view('travails.clientWorks', compact('travails'));
        // return response()->json($travail);
    }


    public function acceptorrefus(Request $request, $id)
    {
        $travail = Travail::find($id);
        $travail->etat = $request->input('etat');

        if ($travail->etat === 'refuse') {
            $travail->motifRefus = $request->input('motifRefus');
        } else {
            Travail::findOrFail($id)->update(['etat' => $request['etat']]);
            Contact::create([
                'travail_id' => $travail->id
            ]);
        }

        $travail->save();
        return redirect()->back()->with('success', 'Etat successfully sent.');
    }

    //fin travail
    public function Fin_travail($id)
    {
        $travail = Travail::where('id', $id)->first();
        if ($travail->user_id == Auth()->user()->id) {
            $travail->update(['finTravail' => today(), 'etat' => 'finish']);

            $tacheur_service = TacheurService::where("id", $travail->tacheur_service_id)->first();

            $tacheur = Tacheur::where('id', $tacheur_service->tacheur_id)->first();
            $tacheur->solde += $travail->nbr_houre * $tacheur_service->tarifs;
            $tacheur->save();
        }
        return redirect()->back();
    }

    public function deleteDemandeService($travailId){
        $travailId = Travail::findOrFail($travailId)->delete();
        return redirect()->back()->with('demandeService', 'Demande de service supprimé !');
    }

    public function editDemandeService($travailId)
{
    $travail = Travail::findOrFail($travailId);
    return view('travail.edit', compact('travail'));
}

public function updateDemandeService(Request $request, $travailId)
{
    $travail = Travail::findOrFail($travailId);

    // Validation des données
    $validatedData = $request->validate([
        'detailTache' => 'required|string|max:255',
        'startTravail' => 'required|date',
        'nbr_houre' => 'required|integer',
        'finTravail' => 'required|date',
        'adresse' => 'required|string|max:255',
        
    ]);

    // Mise à jour du service demandé
    $travail->update($validatedData);

    return redirect()->back()->with('demandeService', 'Demande de service mise à jour !');
}







}
