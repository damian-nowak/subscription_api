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
    public function index()
    {
        return Subscription::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SubscriptionCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionCreateRequest $request)
    {
        return Subscription::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Subscription $subs
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subs)
    {
        return $subs;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubscriptionUpdateRequest  $request
     * @param  Subscription $subs
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriptionUpdateRequest $request, Subscription $subs)
    {
        $subs->update($request->all());
        return $subs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subscription $subs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subs)
    {
        $subs->delete();
        return new JsonResponse('', 204);
    }
}
