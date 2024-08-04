<?php

use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TravailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);


Route::middleware('auth:api')->group(function () {

    Route::post('logout', [RegisterController::class, 'logout']);
    Route::post('editProfile', [RegisterController::class, 'editProfile']);
    Route::get('getProfile', [RegisterController::class, 'getProfile']);

    # ADMIN :
    // Route::middleware(['AuthAccess:Admin'])->group(function () {
        Route::post('store_servise', [ServiceController::class, 'store']);
    // });

    # CLIENT :
    Route::middleware(['AuthRole:Client', 'verified'])->group(function () {
        Route::post('ChoixServices', [TravailController::class, 'ChoixServices']);
        Route::get('getnewTravailforClient', [TravailController::class, 'getnewTravailforClient']);
        Route::get('getallTravailforClient', [TravailController::class, 'getnewTravailforClient']);
        Route::post('reclametacheur', [ServiceController::class, 'reclametacheur']);
    });

    # Tacheur :
    Route::middleware(['AuthAccess:Tacheur', 'verified'])->group(function () {
        Route::get('TaskTacheur', [ServiceController::class, 'TaskTacheur']);
        Route::post('convertsolde', [RegisterController::class, 'convertsolde']);
        Route::post('Fconvertsolde', [RegisterController::class, 'Fconvertsolde']);
        Route::get('getsolde', [RegisterController::class, 'getsolde']);
        Route::apiResource('portfolio', PortfolioController::class);
        Route::post('storeTaskTacheur', [ServiceController::class, 'storetasktacheur']);
        Route::get('getnewTravailforTacheur', [TravailController::class, 'getnewTravailforTacheur']);
        Route::get('getallTravailforTacheur', [TravailController::class, 'getnewTravailforTacheur']);
        Route::post('acceptorrefus', [TravailController::class, 'acceptorrefus']);
        Route::post('Fin_travail', [TravailController::class, 'Fin_travail']);


        // Route::put('portfolio/{id}', [PortfolioController::class, 'updatePortfolio'])->name('updatePortfolio');
        // Route::apiResource('portfolio', PortfolioController::class)->only(['update']);
    });

});


        Route::get('services/search/{nom}', [ServiceController::class, 'search']);
        Route::get('services/{serviceId}/taskers', [ServiceController::class, 'showTaskers']);
        Route::post('Tacheurs', [ServiceController::class, 'AllTacheur']);
        Route::post('services', [ServiceController::class, 'AllTask']);
        Route::post('getTaskTacheur', [ServiceController::class, 'getTaskTacheur']);
        Route::post('reclame', [ServiceController::class, 'reclame']);

