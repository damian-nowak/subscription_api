<?php

namespace App\Clients\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Infrastructure\Clients\Client;
use Infrastructure\Subscriptions\Subscription;
use Illuminate\Http\JsonResponse;
use App\Clients\Services\ClientApplicationService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @apiDefine ResourceNotFoundError
 *
 * @apiError 404 ResourceNotFound The requested resource was not found.
 */
class ClientSubscriptionController extends Controller
{
    public $appService;

    public function __construct(ClientApplicationService $appService)
    {
        $this->appService = $appService;
    }

    /**
     * @api {get} /clients/:id/subs Display client's subscriptions.
     * @apiParam {Number} id Client unique ID
     *
     * @apiVersion 0.1.0
     * @apiName GetClientSubs
     * @apiGroup Clients_Subscriptions
     *
     * @apiSuccess (200) {Object[]} subscription Client subscriptions data.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function listClientSubscriptions(int $id)
    {
        $clientSubs = $this->appService->listClientSubscriptions($id);
        return new JsonResponse($clientSubs, 200);
    }

    /**
     * @api {get} /clients/:id/subs/:id Verify client's subscription entitlement.
     * @apiParam {Number} id Client unique ID
     * @apiParam {Number} id Subscription unique ID
     *
     * @apiVersion 0.1.0
     * @apiName GetClientSubscription
     * @apiGroup Clients_Subscriptions
     *
     * @apiSuccess (200) {Object} subscription If client owns subscription - returns subscription data.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param int $id
     * @param int $sub_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientSubscriptionData(int $id, int $sub_id)
    {
        $clientSub = $this->appService->clientSubscriptionData($id, $sub_id);
        return new JsonResponse($clientSub, 200);
    }

    /**
     * @api {post} /clients/:id/subs/:id Client's new subscription.
     * @apiParam {Number} id Client unique ID
     * @apiParam {Number} id Subscription unique ID
     *
     * @apiVersion 0.1.0
     * @apiName PostClientSubs
     * @apiGroup Clients_Subscriptions
     *
     * @apiSuccess 204 Subscription added.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param int $id
     * @param int $sub_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientSubscribes(int $id, int $sub_id)
    {
        $this->appService->clientSubscribes($id, $sub_id);
        return new JsonResponse('', 204);
    }

    /**
     * @api {delete} /clients/:id/subs/:id Client unsubscribes.
     * @apiParam {Number} id Client unique ID
     * @apiParam {Number} id Subscription unique ID
     *
     * @apiVersion 0.1.0
     * @apiName DeleteClientSubs
     * @apiGroup Clients_Subscriptions
     *
     * @apiSuccess 204 Subscription removed.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param int $id
     * @param int $sub_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientUnsubscribes(int $id, int $sub_id)
    {
        $this->appService->clientUnsubscribes($id, $sub_id);
        return new JsonResponse('', 204);
    }
}
