<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    protected $fillable = [
        'subgroup',
        'item',
        'specification',
        'qtreqtopur',
        'qtonstore',
        'acqtreqtopur',
        'unit',
        'piroirty',
        'currency',
        'budget',
        'rowbudget',
        'request_id'  
    ];

    public function prrequest(){
        return $this->belongsTo('App\PrRequest');
    }
}