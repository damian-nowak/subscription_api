<?php

namespace Domain\Subscriptions\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Subscriptions\Subscription;
use Illuminate\Http\JsonResponse;
use Domain\Videos\Video;

/**
 * @apiDefine ResourceNotFoundError
 *
 * @apiError 404 ResourceNotFound The requested resource was not found.
 */
class SubscriptionVideoController extends Controller
{
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
     * @param  Subscription $sub
     * @return \Illuminate\Http\JsonResponse
     */
    public function listSubscriptionVideos(Subscription $sub)
    {
        return new JsonResponse($sub->videos()->get(), 200);
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
     * @param  Subscription $sub
     * @param  Video $video
     * @return \Illuminate\Http\JsonResponse
     */
    public function addVideoToSubscription(Subscription $sub, Video $video)
    {
        $sub->videos()->attach($video);
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
     * @param  Subscription $sub
     * @param  Video $video
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeVideoFromSubscription(Subscription $sub, Video $video)
    {
        $sub->videos()->detach($video);
        return new JsonResponse('', 204);
    }
}
