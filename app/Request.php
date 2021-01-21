<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $dates = [
        'date'
    ];

    protected $fillable = [
        'req#',
        'department'
    ];

    public function requestitems(){
        return $this->hasMany('App\ReqestItem');
    }
}
