<?php

namespace Domain\Clients;

use Domain\Subscriptions\Subscription;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['subscriptions'];

    /**
     * The videos that belong to the subscription.
     */
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }
}
