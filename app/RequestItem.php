<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestItem extends Model
{
    protected $fillable = [
        'item',
        'description',
        'specification',
        'date',
        'qtreqtopur',
        'qtonstore',  
        'acqtreqtopur',
        'budget',
        'totalbudget',
        'request_id'  
    ];

    public function request(){
        return $this->belongsTo('App\PrRequest');
    }
}