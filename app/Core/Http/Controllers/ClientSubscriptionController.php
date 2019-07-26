<?php

namespace App\Core\Http\Controllers;

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
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function listClientSubscriptions($id)
    {
        $client = Client::findOrFail($id);
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
     * @param  $id
     * @param  $sub_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientSubscriptionData($id, $sub_id)
    {
        $client = Client::findOrFail($id);
        $checkOwnership = $client->subscriptions()->where('subscriptions.id', $sub_id)->count();

        if($checkOwnership === 0){
            throw new NotFoundHttpException('Resource not found', null, 404);
        }

        return Subscription::find($sub_id);
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
     * @param  $id
     * @param  $sub_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientSubscribes($id, $sub_id)
    {
        $client = Client::findOrFail($id);
        $sub = Subscription::findOrFail($sub_id);
        $client->subscriptions()->attach($sub->id);
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
     * @param  $id
     * @param  $sub_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientUnsubscribes($id, $sub_id)
    {
        $client = Client::findOrFail($id);
        $sub = Subscription::findOrFail($sub_id);
        $client->subscriptions()->detach($sub->id);
        return new JsonResponse('', 204);
    }
}
