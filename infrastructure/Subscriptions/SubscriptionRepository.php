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

    public function find(int $id)
    {
        return $this->subscription::findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->subscription::create([
            'name' => $data['name']
        ]);
    }

    public function update(int $id, array $data)
    {
        $subToUpdate = $this->subscription::findOrFail($id);

        empty($data['name']) ?: $subToUpdate->update([
            'name' => $data['name']
        ]);

        return $subToUpdate;
    }

    public function delete(int $id)
    {
        $subToDelete = $this->subscription::findOrFail($id);
        return $subToDelete->delete();
    }

    // Eager load database relationships
    public function with(string $relations)
    {
        return $this->model->with($relations);
    }

    public function withVideos(int $sub_id)
    {
        return ($this->subscription::findOrFail($sub_id))->videos;
    }
}