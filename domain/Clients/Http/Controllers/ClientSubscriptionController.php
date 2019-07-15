<?php

namespace Domain\Clients\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Clients\Client;
use Domain\Subscriptions\Subscription;
use Illuminate\Http\JsonResponse;

class ClientSubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function listClientSubscriptions(Client $client)
    {
        return new JsonResponse($client->subscriptions()->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Client $client
     * @param  Subscription $sub
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientSubscribes(Client $client, Subscription $sub)
    {
        $client->subscriptions()->attach($sub);
        return new JsonResponse('', 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @param  Subscription $sub
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientUnsubscribes(Client $client, Subscription $sub)
    {
        $client->subscriptions()->detach($sub);
        return new JsonResponse('', 204);
    }
}
