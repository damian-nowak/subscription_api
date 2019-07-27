<?php

namespace Infrastructure\Clients;

use Infrastructure\Subscriptions\Subscription;
use Infrastructure\Videos\Video;
use Illuminate\Support\Collection;
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
    protected $with = ['subscriptions', 'videos'];

    /**
     * The videos that belong to the subscription.
     */
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }

    /**
     * The videos that belong to the subscription.
     */
    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }

    /**
     * Undocumented function
     *
     * @return Collection
     */
    public function allVideos()
    {
        $subbedVids = collect([]);
        $this->subscriptions->each(function($sub) use (&$subbedVids){
            $tt = $sub->videos;
            return $subbedVids->push($tt);
        });

        $flat = $subbedVids->flatten();
        $vids = $this->videos;
        $unique = $vids->concat($flat)->unique('id');

        return $vids->concat($flat)->unique('id');
    }
}
