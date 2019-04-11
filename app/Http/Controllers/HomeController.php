<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\Sector;
use App\Contractor;
use App\User;
use App\Task;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activitys=Activity::paginate(5);

        $sectors=Sector::all();
        $tasks=Task::all();
        
        $users=User::all();
        $contractors=Contractor::all();

        return view('home',compact('activitys','sectors','contractors','users','tasks'));
    }

}
