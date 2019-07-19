<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StatusPieChart extends Controller
{
    function index()
    {
    	$data=DB::table('tasks')
    			->select(
    				DB::raw('status as status'),
    				DB::raw('count(*) as number'))
    			->groupBy('status')
    			->get();
    	$array[]=['Status','Number'];

    	foreach ($data as $key => $value) {
    		
    		$array[++$key]=[$value->status, $value->number];
    	}
    	return view('chart.status_pie_chart')->with('status', json_encode($array));
    }
}
