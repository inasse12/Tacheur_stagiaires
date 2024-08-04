<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\ClientRequest;
use App\Models\Admin;
use App\Models\Client;
use App\Models\convert;
use App\Models\reclame;
use App\Models\Tacheur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Validator;
use Illuminate\Support\Facades\Validator;


class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

    public function online(User $user, $check)
    {
        if ($user->isTacheur()) {
            Tacheur::where('user_id', $user->id)->update(['online' => $check]);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
            // 'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['nom'] =  $user->nom;

        if ($user->isAdmin()) {
            Admin::create([
                'user_id' => $user->id,
            ]);

            return $this->sendResponse($success, 'Admin register successfully.');
        }

        if ($user->isClient()) {
            Client::create([
                'user_id' => $user->id,
            ]);

            return $this->sendResponse($success, 'Client register successfully.');
        } else if ($user->isTacheur()) {
            Tacheur::create([
                'online' => true,
                'user_id' => $user->id
            ]);

            return $this->sendResponse($success, 'Tacheur register successfully.');
        }
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['nom'] =  $user->nom;

            if ($user->isTacheur()) {
                $this->online($user, true);
            }
            return $this->sendResponse($success, $user->role . ' login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    // Logout api
    public function logout(Request $request)
    {
        try {
            $user = Auth::user();

            $request->user()->token()->revoke();

            if ($user->isTacheur()) {
                $this->online($request->user(), false);
            }

            return response()->json(['message' => 'You have been successfully logged out.']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'There was an error while logging out.']);
        }
    }

    //get proile

    public function getprofile()
    {
        $user = Auth()->user();
        if ($user->isClient()) {
            $user->client;
        } else  if ($user->tacheur()) {
            $user->tacheur;
        } else {
            $user->admin;
        }

        return response()->json([
            'info' => $user,

        ]);
    }

    public function editProfile(Request $request)
    {

        try {
            //validate user data
            $validatedData = $request->validate([
                'nom' => 'string',
                'prenom' => 'string',
                'telephone' => 'string',
                'email' => 'string|email|unique:users,email',
            ]);


            // update user and Crypt password if not empty
            $user = User::where('id', Auth::id())->first();
            if (!empty($request->input('password'))) {
                $user->password = Hash::make($request->input('password'));
            } else {
                $user->password = $user->password;
            }
            $user->save();
            $user->update($validatedData);

            //update client data if user is client
            if ($user->isClient()) {

                $addresse = $request->validate([
                    'adresse' => 'nullable',
                ]);

                Client::where('user_id', Auth()->id())->update($addresse);
            }

            //return info
            return response()->json(['info' => $user, 200]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    //get your solde
    public function getsolde()
    {
        $solde = Auth()->user()->tacheur->solde;
        return response()->json(['solde' => $solde]);
    }

    // convert your solde to your account
    public function convertsolde(Request $request)
    {
        $mon =  $request['Mon'];
        $tacheur = Auth()->user()->tacheur;
        $solde = $tacheur->solde;
        if ($mon > $solde) {
            return response()->json(['solde<mon']);
        } else {
            $tacheur->solde = $solde - $mon;
            $tacheur->save();
            convert::create([
                'solde'=>$mon,
                'verifie'=> false,
                'user_id'=> Auth()->id()
            ]);
            return response()->json(['new solde' => $tacheur->solde]);
        }
    }

    // fin convert your solde to your account
    public function Fconvertsolde(Request $request)
    {
        $userid =  $request['user_id'];
        convert::where("user_id",$userid)->update([
            'verifie'=> true,
        ]);
            return response()->json(['new solde' => $tacheur->solde]);
        
    }

    //reclame
    public function reclame(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message'=> 'required',
            'user_id'=> 'required',
            'tacheur_id'=> 'nullable',
        ]);

        reclame::create( $validator );
        return response()->json("than's ");

    }

        //reclame -> tacheur
        public function reclametacheur(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'message'=> 'required',
                'user_id'=> 'required',
                'tacheur_id'=> 'required',
            ]);

            reclame::create( $validator );
            return response()->json("than's ");

        }
}
