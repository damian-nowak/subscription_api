<?php

namespace Infrastructure\Videos;

use Infrastructure\Subscriptions\Subscription;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    /**
     * The subscriptions that belong to the video.
     */
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }
}
