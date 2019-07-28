<?php

namespace App\Clients\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Clients\Http\Requests\ClientUpdateRequest;
use App\Clients\Http\Requests\ClientCreateRequest;
use Illuminate\Http\JsonResponse;
use App\Clients\Services\ClientApplicationService;

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

    public $appService;

    public function __construct(ClientApplicationService $appService)
    {
        $this->appService = $appService;
    }

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
        return $this->appService->findAll();
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
        $data = $request->only(['email', 'name']);
        return $this->appService->create($data);
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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function showClientData($id)
    {
        return $this->appService->find($id);
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
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function updateClientData(ClientUpdateRequest $request, $id)
    {
        $data = $request->only(['email', 'name']);
        return $this->appService->update($id, $data);
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
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeClient($id)
    {
        $this->appService->delete($id);
        return new JsonResponse('', 204);
    }
}
