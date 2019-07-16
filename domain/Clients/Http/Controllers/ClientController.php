<?php

namespace Domain\Clients\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Clients\Client;
use Domain\Clients\Http\Requests\ClientUpdateRequest;
use Domain\Clients\Http\Requests\ClientCreateRequest;
use Illuminate\Http\JsonResponse;

/**
 * @apiDefine ResourceNotFoundError
 *
 * @apiError 404 ResourceNotFound The requested resource was not found.
 */

/**
 * @apiDefine InvalidDataError
 *
 * @apiError 422 InvalidDataError The payload sent with request has invalid / is missing needed data.
 */
class ClientController extends Controller
{
    /**
     * @api {get} /clients Request all clients
     * @apiVersion 0.1.0
     * @apiName GetClients
     * @apiGroup Clients
     * @apiSuccess {Object[]} client List of all clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function listClients()
    {
        return Client::all();
    }

    /**
     * @api {post} /clients Store a newly created client.
     * @apiVersion 0.1.0
     * @apiName PostClient
     * @apiGroup Clients
     *
     * @apiParam {String} name  required username
     * @apiParam {String} email required, unique user email
     *
     * @apiSuccess (201) {Object} client New client data.
     *
     * @apiUse InvalidDataError
     *
     * @param  ClientCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function newClient(ClientCreateRequest $request)
    {
        return Client::create($request->all());
    }

    /**
     * @api {get} /clients/:id Display the specified client.
     * @apiParam {Number} id Client's unique ID
     *
     * @apiVersion 0.1.0
     * @apiName GetClient
     * @apiGroup Clients
     *
     * @apiSuccess (200) {Object} client Client's data.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function showClientData(Client $client)
    {
        return $client;
    }

    /**
     * @api {put} /clients/:id Update client data.
     * @apiParam {Number} id Client's unique ID
     *
     * @apiVersion 0.1.0
     * @apiName PutClient
     * @apiGroup Clients
     *
     * @apiParam {String} name  new username
     * @apiParam {String} email new unique user email
     *
     * @apiSuccess (200) {Object} client Updated client data.
     *
     * @apiUse ResourceNotFoundError
     * @apiUse InvalidDataError
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
     * @api {delete} /clients/:id Remove client.
     * @apiParam {Number} id Client's unique ID
     *
     * @apiVersion 0.1.0
     * @apiName DeleteClient
     * @apiGroup Clients
     *
     * @apiSuccess 204 Client removed.
     *
     * @apiUse ResourceNotFoundError
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
