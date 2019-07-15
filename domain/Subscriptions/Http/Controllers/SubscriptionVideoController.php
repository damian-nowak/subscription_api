<?php

namespace Domain\Subscriptions\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Subscriptions\Subscription;
use Illuminate\Http\JsonResponse;
use Domain\Videos\Video;

class SubscriptionVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Subscription $sub
     * @return \Illuminate\Http\JsonResponse
     */
    public function listSubscriptionVideos(Subscription $sub)
    {
        return new JsonResponse($sub->videos()->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
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
     * Remove the specified resource from storage.
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
