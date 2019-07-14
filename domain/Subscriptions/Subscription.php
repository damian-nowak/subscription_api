<?php

namespace Domain\Subscriptions;

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
}
