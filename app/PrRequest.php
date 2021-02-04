<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrRequest extends Model
{
    protected $fillable = [
        'date',
        'request_number',
        'department',
        'project',
        'site',
        'group',
        'user_location',
        'user_id',
    ];

    public function requestitems(){
        return $this->hasMany('App\RequestItem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
