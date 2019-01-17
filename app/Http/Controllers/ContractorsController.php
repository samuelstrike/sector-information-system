<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

class ContractorsController extends Controller
{
 
	
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(){

	 	$activitys=Activity::orderBy('id','desc')->paginate(5);
	    return view('activity.contractor',['activitys'=>$activitys]);
	}

}
