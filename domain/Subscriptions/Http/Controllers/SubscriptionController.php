<?php

namespace Domain\Subscriptions\Http\Controllers;

use App\Core\Http\Controllers\Controller;
use Domain\Subscriptions\Subscription;
use Domain\Subscriptions\Http\Requests\SubscriptionUpdateRequest;
use Domain\Subscriptions\Http\Requests\SubscriptionCreateRequest;
use Illuminate\Http\JsonResponse;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listSubscriptions()
    {
        return Subscription::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SubscriptionCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function newSubscription(SubscriptionCreateRequest $request)
    {
        return Subscription::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Subscription $sub
     * @return \Illuminate\Http\Response
     */
    public function showSubscriptionData(Subscription $sub)
    {
        return $sub;
    }

    /**
     * Update the specified resource in storage.
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
     * Remove the specified resource from storage.
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
