<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contractor;

class ContractorController extends Controller
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
        $contractors=Contractor::orderBy('id','desc')->paginate(5);
        return view('contractors.index',['contractors'=>$contractors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contractors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'cdb'=> 'required|numeric'

        ]);
        Contractor::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'cdb'=>$request->cdb


        ]);
        return redirect(route('contractors.index'))->with('message','Contractor record has been added into the database successfully');
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
        $contractor = Contractor::findOrFail($id);
        return view('contractors.edit',compact('contractor'));
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
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'cdb'=> 'required|numeric'
        ]);

        $contractor=Contractor::findOrFail($id);


        $contractor->name=$request->input('name');
        $contractor->address=$request->input('address');    
        $contractor->phone=$request->input('phone');
        $contractor->cdb=$request->input('cdb');
        $contractor->save();
        //session()->flash('message','sector has been updated');

        return redirect()->route('contractors.index')->with('message','contractor detail has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contractor = Contractor::findOrFail($id); 
        $contractor->delete();
        session()->flash('message','contractor info has been deleted');


        return redirect()->route('contractors.index')
            ->with('flash_message',
             'Contractor info has been successfully deleted.');
    }
}
