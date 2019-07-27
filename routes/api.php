<?php

use App\Clients\Http\Controllers\ClientController;
use App\Clients\Http\Controllers\ClientSubscriptionController;
use App\Clients\Http\Controllers\ClientVideoController;
use App\Videos\Http\Controllers\VideoController;
use App\Subscriptions\Http\Controllers\SubscriptionController;
use App\Subscriptions\Http\Controllers\SubscriptionVideoController;

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

Route::prefix('v1')->group(function () {
    Route::get('clients', [ClientController::class, 'listClients']);
    Route::get('clients/{id}', [ClientController::class, 'showClientData']);
    Route::post('clients', [ClientController::class, 'newClient']);
    Route::put('clients/{id}', [ClientController::class, 'updateClientData']);
    Route::delete('clients/{id}', [ClientController::class, 'removeClient']);

    Route::get('clients/{id}/subs', [ClientSubscriptionController::class, 'listClientSubscriptions']);
    Route::get('clients/{id}/subs/{sub_id}', [ClientSubscriptionController::class, 'clientSubscriptionData']);
    Route::post('clients/{id}/subs/{sub_id}', [ClientSubscriptionController::class, 'clientSubscribes']);
    Route::delete('clients/{id}/subs/{sub_id}', [ClientSubscriptionController::class, 'clientUnsubscribes']);

    Route::get('clients/{id}/videos', [ClientVideoController::class, 'listClientVideos']);
    Route::get('clients/{id}/videos/{vid_id}', [ClientVideoController::class, 'clientVideoData']);
    Route::post('clients/{id}/videos/{vid_id}', [ClientVideoController::class, 'clientAddsVideo']);
    Route::delete('clients/{id}/videos/{vid_id}', [ClientVideoController::class, 'removeClientVideo']);

    Route::get('videos', [VideoController::class, 'listVideos']);
    Route::get('videos/{vid_id}', [VideoController::class, 'showVideoData']);
    Route::post('videos', [VideoController::class, 'newVideo']);
    Route::put('videos/{vid_id}', [VideoController::class, 'updateVideoData']);
    Route::delete('videos/{vid_id}', [VideoController::class, 'removeVideo']);

    Route::get('subs', [SubscriptionController::class, 'listSubscriptions']);
    Route::get('subs/{sub_id}', [SubscriptionController::class, 'showSubscriptionData']);
    Route::post('subs', [SubscriptionController::class, 'newSubscription']);
    Route::put('subs/{sub_id}', [SubscriptionController::class, 'updateSubscriptionData']);
    Route::delete('subs/{sub_id}', [SubscriptionController::class, 'removeSubscription']);

    Route::get('subs/{sub_id}/videos', [SubscriptionVideoController::class, 'listSubscriptionVideos']);
    Route::post('subs/{sub_id}/videos/{vid_id}', [SubscriptionVideoController::class, 'addVideoToSubscription']);
    Route::delete('subs/{sub_id}/videos/{vid_id}', [SubscriptionVideoController::class, 'removeVideoFromSubscription']);
});
