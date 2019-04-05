<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Activity;

class Task extends Model
{
    protected $fillable = ['activity_id','status','progress'];

    protected $table='tasks';


    public function activity()
    {
    	return $this->belongsTo('App\Activity','activity_id','id');
    }


}
