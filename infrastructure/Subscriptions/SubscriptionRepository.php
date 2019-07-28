<?php

namespace Infrastructure\Subscriptions;

use Domain\Contracts\Repositories\RepositoryInterface;
use Infrastructure\Subscriptions\Subscription;

class SubscriptionRepository implements RepositoryInterface
{
    protected $subscription;

    public function __construct(Subscription $subscription)
    {
        $this->subscription = $subscription;
    }

    public function findAll()
    {
        return $this->subscription::all();
    }

    public function find($id)
    {
        return $this->subscription::findOrFail($id);
    }

    public function create($data)
    {
        return $this->subscription::create([
            'name' => $data['name']
        ]);
    }

    public function update($id, $data)
    {
        $subToUpdate = $this->subscription::findOrFail($id);

        empty($data['name']) ?: $subToUpdate->update([
            'name' => $data['name']
        ]);

        return $subToUpdate;
    }

    public function delete($id)
    {
        $clientToDelete = $this->subscription::findOrFail($id);
        return $clientToDelete->delete();
    }
}