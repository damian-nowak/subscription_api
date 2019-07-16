<?php

namespace Domain\Clients\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Clients\Client;
use Domain\Subscriptions\Subscription;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @apiDefine ResourceNotFoundError
 *
 * @apiError 404 ResourceNotFound The requested resource was not found.
 */
class ClientSubscriptionController extends Controller
{
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
     * @param  Client $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function listClientSubscriptions(Client $client)
    {
        return new JsonResponse($client->subscriptions()->get(), 200);
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
     * @param  Client $client
     * @param  Subscription $subscription
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientSubscriptionData(Client $client, Subscription $sub)
    {
        $checkOwnership = $client->subscriptions()->where('subscriptions.id', $sub->id)->count();

        if($checkOwnership === 0){
            throw new NotFoundHttpException('Resource not found', null, 404);
        }

        return $sub;
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
