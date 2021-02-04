<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    protected $fillable = [
        'item',
        'qtreqtopur',
        'qtonstore',
        'acqtreqtopur',
        'date',
        'description',  
        'specification',
        'budget',
        'rowbudget',
        'request_id'  
    ];

    public function prrequest(){
        return $this->belongsTo('App\PrRequest');
    }
}