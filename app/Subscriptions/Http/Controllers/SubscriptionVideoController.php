<?php

namespace App\Subscriptions\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Subscriptions\Services\SubscriptionApplicationService;

/**
 * @apiDefine ResourceNotFoundError
 *
 * @apiError 404 ResourceNotFound The requested resource was not found.
 */
class SubscriptionVideoController extends Controller
{
    public $appService;

    public function __construct(SubscriptionApplicationService $appService)
    {
        $this->appService = $appService;
    }

    /**
     * @api {get} /subs/:id/videos Display videos connected with subscription.
     * @apiParam {Number} id Subscription unique ID
     *
     * @apiVersion 0.1.0
     * @apiName GetSubscriptionVids
     * @apiGroup Subscriptions_Videos
     *
     * @apiSuccess (200) {Object[]} video Subscription videos data.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param int $sub_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function listSubscriptionVideos($sub_id)
    {
        $subWithVideos = $this->appService->getSubscriptionVideos($sub_id);
        return new JsonResponse($subWithVideos, 200);
    }

    /**
     * @api {post} /subs/:id/videos/:id Add video to subscription.
     * @apiParam {Number} id Subscription unique ID
     * @apiParam {Number} id Video unique ID
     *
     * @apiVersion 0.1.0
     * @apiName PostSubscriptionVideo
     * @apiGroup Subscriptions_Videos
     *
     * @apiSuccess 204 Video added.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param int $sub_id
     * @param int $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addVideoToSubscription($sub_id, $vid_id)
    {
        $this->appService->addVideoToSubscription($vid_id, $sub_id);
        return new JsonResponse('', 204);
    }

    /**
     * @api {delete} /subs/:id/videos/:id Remove video from subscription.
     * @apiParam {Number} id Subscription unique ID
     * @apiParam {Number} id Video unique ID
     *
     * @apiVersion 0.1.0
     * @apiName DeleteSubscriptionVideo
     * @apiGroup Subscriptions_Videos
     *
     * @apiSuccess 204 Video removed.
     *
     * @apiUse ResourceNotFoundError
     *
     * @param int $sub_id
     * @param int $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeVideoFromSubscription($sub_id, $vid_id)
    {
        $this->appService->removeVideoFromSubscription($vid_id, $sub_id);
        return new JsonResponse('', 204);
    }
}
