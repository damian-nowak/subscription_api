<?php

use Domain\Clients\Http\Controllers\ClientController;
use Domain\Clients\Http\Controllers\ClientSubscriptionController;
use Domain\Clients\Http\Controllers\ClientVideoController;
use Domain\Videos\Http\Controllers\VideoController;
use Domain\Subscriptions\Http\Controllers\SubscriptionController;
use Domain\Subscriptions\Http\Controllers\SubscriptionVideoController;
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
    Route::get('clients', [ClientController::class, 'listClients']);
    Route::get('clients/{client}', [ClientController::class, 'showClientData']);
    Route::post('clients', [ClientController::class, 'newClient']);
    Route::put('clients/{client}', [ClientController::class, 'updateClientData']);
    Route::delete('clients/{client}', [ClientController::class, 'removeClient']);

    Route::get('clients/{client}/subs', [ClientSubscriptionController::class, 'listClientSubscriptions']);
    Route::post('clients/{client}/subs/{sub}', [ClientSubscriptionController::class, 'clientSubscribes']);
    Route::delete('clients/{client}/subs/{sub}', [ClientSubscriptionController::class, 'clientUnsubscribes']);

    Route::get('clients/{client}/videos', [ClientVideoController::class, 'listClientVideos']);
    Route::get('clients/{client}/videos/{video}', [ClientVideoController::class, 'clientVideoData']);
    Route::post('clients/{client}/videos/{video}', [ClientVideoController::class, 'clientAddsVideo']);
    Route::delete('clients/{client}/videos/{video}', [ClientVideoController::class, 'removeClientVideo']);

    Route::get('videos', [VideoController::class, 'listVideos']);
    Route::get('videos/{video}', [VideoController::class, 'showVideoData']);
    Route::post('videos', [VideoController::class, 'newVideo']);
    Route::put('videos/{video}', [VideoController::class, 'updateVideoData']);
    Route::delete('videos/{video}', [VideoController::class, 'removeVideo']);

    Route::get('subs', [SubscriptionController::class, 'listSubscriptions']);
    Route::get('subs/{sub}', [SubscriptionController::class, 'showSubscriptionData']);
    Route::post('subs', [SubscriptionController::class, 'newSubscription']);
    Route::put('subs/{sub}', [SubscriptionController::class, 'updateSubscriptionData']);
    Route::delete('subs/{sub}', [SubscriptionController::class, 'removeSubscription']);

    Route::get('subs/{sub}/videos', [SubscriptionVideoController::class, 'listSubscriptionVideos']);
    Route::post('subs/{sub}/videos/{video}', [SubscriptionVideoController::class, 'addVideoToSubscription']);
    Route::delete('subs/{sub}/videos/{video}', [SubscriptionVideoController::class, 'removeVideoFromSubscription']);
});
