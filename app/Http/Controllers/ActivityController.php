<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Activity;
use App\Contractor;
use App\User;
use App\Sector;
class ActivityController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $activitys=Activity::orderBy('id','desc')->paginate(5);
         return view('activity.index',['activitys'=>$activitys]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contractors=Contractor::all();
        return view('activity.create',compact('contractors'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();

        $this->validate($request, [

            'name'=>'required|min:5',
            'location'=>'required|min:3',
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'total_budget'=>'required|numeric',
            'est_budget'=>'required|numeric',
            'bid_amount'=>'required|numeric',
            'physical_progress'=>'required|numeric',
            'financial_progress'=>'required|numeric'

        ]);
        Activity::create([

            'name'=>$request->name,
            'user_id'=>$id,
            'location'=>$request->location,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'total_budget'=>$request->total_budget,
            'est_budget'=>$request->est_budget,
            'bid_amount'=>$request->bid_amount,
            'physical_progress'=>$request->physical_progress,
            'financial_progress'=>$request->financial_progress,
            'contractor_id'=>$request->contractor_id,
            'remarks'=>$request->remarks
        ]);

        return redirect(route('activity.index'))->with('message','Activity/Project has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
