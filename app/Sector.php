<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
        'cid','sector_name','sector_head'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User','id');
    }
}
