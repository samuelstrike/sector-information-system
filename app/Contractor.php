<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Activity;

class Contractor extends Model
{
    protected $fillable=['name','address','phone','cdb'];

    protected $table='contractors';

    public function activitys()
    {
    	return $this->hasMany(Activity::class);
    }
}
