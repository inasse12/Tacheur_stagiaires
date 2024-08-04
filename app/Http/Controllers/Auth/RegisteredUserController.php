<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Image;
use App\Models\Service;
use App\Models\Tacheur;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function createtacheur(): View
    {
        $role = 'Tacheur';
        return view('auth.register', compact('role'));
    }

    public function createClient(): View
    {
        $role = "Client";
        return view('auth.register', compact('role'));
    }

    public function create(): View
    {
        abort(404);
        // return view('auth.register');
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'role' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        if ($request->hasFile('img')) {

            $path = $request->file('img')->store('public/users');

            $user->image()->save(Image::make(['path' => $path]));
        }

        if ($user->isClient()) {
            Client::create([
                'user_id' => $user->id,
            ]);
        } else if ($user->isTacheur()) {
            Tacheur::create([
                'online' => true,
                'user_id' => $user->id
            ]);
        }

        event(new Registered($user));

        Auth::login($user);
        if ($user->isTacheur()) {
            $services = Service::get();
            return view('auth.task', compact('services'));
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
