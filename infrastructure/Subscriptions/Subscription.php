<?php

namespace Infrastructure\Subscriptions;

use Infrastructure\Clients\Client;
use Infrastructure\Videos\Video;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['videos'];

    /**
     * The videos that belong to the subscription.
     */
    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }

    /**
     * The videos that belong to the subscription.
     */
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
}
