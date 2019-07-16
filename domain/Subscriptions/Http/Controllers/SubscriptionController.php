<?php

namespace Domain\Subscriptions\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Subscriptions\Subscription;
use Domain\Subscriptions\Http\Requests\SubscriptionUpdateRequest;
use Domain\Subscriptions\Http\Requests\SubscriptionCreateRequest;
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
class SubscriptionController extends Controller
{
    /**
     * @api {get} /subs Request all subscriptions
     * @apiVersion 0.1.0
     * @apiName GetSubscriptions
     * @apiGroup Subscriptions
     *
     * @apiSuccess {Object[]} subscription List of all subscriptions.
     *
     * @return \Illuminate\Http\Response
     */
    public function listSubscriptions()
    {
        return Subscription::all();
    }

    /**
     * @api {post} /subs Store a newly created subscription.
     * @apiVersion 0.1.0
     * @apiName PostSubscription
     * @apiGroup Subscriptions
     *
     * @apiParam {String} name  required subscription name
     *
     * @apiSuccess (201) {Object} subscription New subscription data.
     *
     * @apiUse InvalidDataError
     *
     * @param  SubscriptionCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function newSubscription(SubscriptionCreateRequest $request)
    {
        return Subscription::create($request->all());
    }

    /**
     * @api {get} /subs/:id Display the specified subscription.
     * @apiParam {Number} id Subscription's unique ID
     *
     * @apiVersion 0.1.0
     * @apiName GetSubscription
     * @apiGroup Subscriptions
     *
     * @apiSuccess (200) {Object} subscription Subscription's data.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param  Subscription $sub
     * @return \Illuminate\Http\Response
     */
    public function showSubscriptionData(Subscription $sub)
    {
        return $sub;
    }

    /**
     * @api {put} /subs/:id Update subscription data.
     * @apiParam {Number} id Subscription's unique ID
     *
     * @apiVersion 0.1.0
     * @apiName PutSubscription
     * @apiGroup Subscriptions
     *
     * @apiParam {String} name  new subscription name
     *
     * @apiSuccess (200) {Object} subscription Updated subscription's data.
     *
     * @apiUse ResourceNotFoundError
     * @apiUse InvalidDataError
     *
     * @param  SubscriptionUpdateRequest  $request
     * @param  Subscription $sub
     * @return \Illuminate\Http\Response
     */
    public function updateSubscriptionData(SubscriptionUpdateRequest $request, Subscription $sub)
    {
        $sub->update($request->all());
        return $sub;
    }

    /**
     * @api {delete} /subs/:id Remove subscription.
     * @apiParam {Number} id Subscription's unique ID
     *
     * @apiVersion 0.1.0
     * @apiName DeleteSubscription
     * @apiGroup Subscriptions
     *
     * @apiSuccess 204 Subscription removed.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param  Subscription $sub
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeSubscription(Subscription $sub)
    {
        $sub->delete();
        return new JsonResponse('', 204);
    }
}
