<?php

use Domain\Clients\Http\Controllers\ClientController;
use Domain\Videos\Http\Controllers\VideoController;
use Domain\Subscriptions\Http\Controllers\SubscriptionController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('clients', [ClientController::class, 'index']);
    Route::get('clients/{client}', [ClientController::class, 'show']);
    Route::post('clients', [ClientController::class, 'store']);
    Route::put('clients/{client}', [ClientController::class, 'update']);
    Route::delete('clients/{client}', [ClientController::class, 'destroy']);

    Route::get('videos', [VideoController::class, 'index']);
    Route::get('videos/{video}', [VideoController::class, 'show']);
    Route::post('videos', [VideoController::class, 'store']);
    Route::put('videos/{video}', [VideoController::class, 'update']);
    Route::delete('videos/{video}', [VideoController::class, 'destroy']);

    Route::get('subs', [SubscriptionController::class, 'index']);
    Route::get('subs/{subs}', [SubscriptionController::class, 'show']);
    Route::post('subs', [SubscriptionController::class, 'store']);
    Route::put('subs/{subs}', [SubscriptionController::class, 'update']);
    Route::delete('subs/{subs}', [SubscriptionController::class, 'destroy']);
});
