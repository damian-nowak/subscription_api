<?php

namespace Domain\Clients\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Clients\Client;
use Domain\Clients\Http\Requests\ClientUpdateRequest;
use Domain\Clients\Http\Requests\ClientCreateRequest;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listClients()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ClientCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function newClient(ClientCreateRequest $request)
    {
        return Client::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function showClientData(Client $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClientUpdateRequest  $request
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function updateClientData(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->all());
        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeClient(Client $client)
    {
        $client->delete();
        return new JsonResponse('', 204);
    }
}
