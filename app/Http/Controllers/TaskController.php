<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Activity;
use App\Task;
use DB;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','clearance'])->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	$tasks=Task::paginate(5);
    	$activitys=Activity::all();

    	return view('tasks.index',compact('tasks','activitys'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$activitys=Activity::all();
    	return view('tasks.create',compact('activitys'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'activity_id'=>'required|unique:tasks',
            'status'=>'required',
            'progress'=>'required|max:100|min:0'

        ]);

     
        Task::create([

        'activity_id'=>$request->activity_id,
        'status'=>$request->status,
        'progress'=>$request->progress,
        'monitor_date'=>$request->monitor_date
           
        ]);


        return redirect(route('tasks.index'))->with('message','The task has been added to the project');   
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
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
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
        
        $task = Task::findOrFail($id);
        $task->status = $request->input('status');
        $task->progress=$request->input('progress');
        $task->monitor_date=$request->input('monitor_date');
        $task->save();

        return redirect()->route('tasks.index', 
            $task->id)->with('message', 
            'Status, '. $task->activity_id.' updated');
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
