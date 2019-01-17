<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use Session;


class SectorController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'clearance']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sectors=Sector::orderBy('id','desc')->paginate(5);
        return view('sectors.index',['sectors'=>$sectors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sectors.create');
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
            'cid'=>'required|numeric',
            'sector_name'=>'required|min:4',
            'sector_head'=>'required|min:4'
        ]);

        Sector::create([

            'cid'=>$request->cid,
            'sector_name'=>$request->sector_name,
            'sector_head'=>$request->sector_head
        ]);
        //session()->flash('message','sector has been created successfully');

        return redirect(route('sectors.index'))->with('message','sector has been created successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sectors=Sector::findOrFail($id);

        return view ('sectors.index', compact('sectors'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $sector = Sector::findOrFail($id);
        return view('sectors.edit',compact('sector'));
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
         $this->validate($request, [
            'cid'=>'required|numeric|min:12',
            'sector_name'=>'required|min:4',
            'sector_head'=>'required|min:4'
        ]);

        $sector=Sector::findOrFail($id);


        $sector->cid=$request->input('cid');
        $sector->sector_name=$request->input('sector_name');    
        $sector->sector_head=$request->input('sector_head');
        $sector->save();
        //session()->flash('message','sector has been updated');

        return redirect()->route('sectors.index')->with('message','sector has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::findOrFail($id); 
        $sector->delete();
        session()->flash('message','sector has been deleted');


        return redirect()->route('sectors.index')
            ->with('flash_message',
             'Sector successfully deleted.');
    }
}
