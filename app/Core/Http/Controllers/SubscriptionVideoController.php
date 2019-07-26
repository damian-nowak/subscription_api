<?php

namespace App\Core\Http\Controllers;

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
     * @param  $sub_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function listSubscriptionVideos($sub_id)
    {
        $sub = Subscription::findOrFail($sub_id);
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
     * @param  $sub_id
     * @param  $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addVideoToSubscription($sub_id, $vid_id)
    {
        $sub = Subscription::findOrFail($sub_id);
        $vid = Video::findOrFail($vid_id);
        $sub->videos()->attach($vid->id);
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
     * @param  $sub_id
     * @param  $vid_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeVideoFromSubscription($sub_id, $vid_id)
    {
        $sub = Subscription::findOrFail($sub_id);
        $vid = Video::findOrFail($vid_id);
        $sub->videos()->detach($vid->id);
        return new JsonResponse('', 204);
    }
}
