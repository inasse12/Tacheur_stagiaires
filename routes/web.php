<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TravailController;
use App\Http\Resources\ContactCollection;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('HOME');

Route::resource('services', ServiceController::class)->only('index');
Route::post('services/search', [ServiceController::class, 'search'])->name('search-services');



Route::middleware('auth')->group(function () {

    Route::post('storeTaskTacheur', [ServiceController::class, 'storetasktacheur'])->name('storetasktacheur');
    Route::get('/travail/{travailId}/edit', [TravailController::class, 'editDemandeService'])->name('editDemandeService');
    Route::put('/travail/{travailId}', [TravailController::class, 'updateDemandeService'])->name('updateDemandeService');

    Route::post('/verification-submit', [VerificationController::class, 'submit'])->name('verification.submit');


    Route::middleware(['AuthAccess'])->group(function () {


        Route::delete('deleteDemandeService/{travailId}', [TravailController::class, 'deleteDemandeService'])->name('deleteDemandeService');

        Route::middleware(['AuthRole:Client'])->group(function () {

            Route::resource('services', ServiceController::class)->except('index');
            Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

            Route::controller(TravailController::class)->group(function () {
                Route::get('getnewTravailforClient', 'getnewTravailforClient')->name('clientWorks');
                Route::get('getallTravailforClient', 'getallTravailforClient')->name('allClientWorks');
                Route::post('ChoixServices', 'ChoixServices')->name('ChoixServices');

                Route::get('acceptforClient', 'acceptforClient')->name('acceptforClient');
                Route::get('refuseforClient', 'refuseforClient')->name('refuseforClient');
                Route::get('Fin_travail/{id}', 'Fin_travail')->name('Fin_travail');
                Route::get('finishforClient', 'finishforClient')->name('finishforClient');
            });

            Route::get('Travail/{id}', [ServiceController::class, 'Travail'])->name('Travail');
        });

        Route::middleware(['AuthRole:Tacheur'])->group(function () {

            // Route::post('storeTaskTacheur', [ServiceController::class, 'storetasktacheur'])->name('storetasktacheur');
            Route::resource('portfolio', PortfolioController::class);

            Route::controller(TravailController::class)->group(function () {
                Route::get('getnewTravailforTacheur', 'getnewTravailforTacheur')->name('tacheurWorks');
                Route::get('getallTravailforTacheur', 'getallTravailforTacheur')->name('allTacheurWorks');
                Route::get('acceptforTacheur', 'acceptforTacheur')->name('acceptforTacheur');
                Route::get('refuseforTacheur', 'refuseforTacheur')->name('refuseforTacheur');
                Route::get('finishfortacheur', 'finishfortacheur')->name('finishfortacheur');
                Route::post('etat/{id}', 'acceptorrefus')->name('acceptorrefus');
            });
        });

        Route::middleware(['AuthRole:Admin', 'verified'])->group(function () {
            Route::resource('services', ServiceController::class)->except('index');
        });

        Route::get('pro', function () {
            return view('profile');
        });

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

        Route::get('message/{id}', [ContactController::class, 'show'])->name('message');
        Route::post('message', [MessageController::class, 'store'])->name('message.store');
    });
});


require __DIR__ . '/auth.php';
