<?php

namespace Domain\Videos;

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
}
