<?php

namespace App\Subscriptions\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use App\Subscriptions\Http\Requests\SubscriptionUpdateRequest;
use App\Subscriptions\Http\Requests\SubscriptionCreateRequest;
use Illuminate\Http\JsonResponse;
use App\Subscriptions\Services\SubscriptionApplicationService;

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
    public $appService;

    public function __construct(SubscriptionApplicationService $appService)
    {
        $this->appService = $appService;
    }

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
        return $this->appService->findAll();
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
        $data = $request->only('name');
        return $this->appService->create($data);
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
     * @param  $sub_id
     * @return \Illuminate\Http\Response
     */
    public function showSubscriptionData($sub_id)
    {
        return $this->appService->find($sub_id);
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
     * @param  $sub_id
     * @return \Illuminate\Http\Response
     */
    public function updateSubscriptionData(SubscriptionUpdateRequest $request, $sub_id)
    {
        $data = $request->only('name');
        return $this->appService->update($sub_id, $data);
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
     * @param  $sub_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeSubscription($sub_id)
    {
        $this->appService->delete($sub_id);
        return new JsonResponse('', 204);
    }
}
