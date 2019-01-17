<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contractor;

class Activity extends Model
{
    protected $fillable = [
        'name','user_id','location','start_date','end_date','total_budget','est_budget','bid_amount',
        'physical_progress','financial_progress','contractor_id','remarks'
    ];
    protected $table='activities';

    protected $cast=[

    	'start_date'=>'date:d-m-Y',
    	'end_date'=>'date:d-m-Y'

    ];

    public function contractor()
    {
    	return $this->belongsTo(Contractor::class);
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
