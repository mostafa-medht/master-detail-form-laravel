<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrRequest extends Model
{
    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'date',
        'request_number',
        'department',
        'project',
        'site',
        'group'
    ];

    public function requestitems(){
        return $this->hasMany('App\RequestItem');
    }
}
