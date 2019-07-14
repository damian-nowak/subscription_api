<?php

namespace Domain\Clients;

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
}
