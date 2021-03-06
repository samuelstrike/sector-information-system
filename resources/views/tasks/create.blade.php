@extends('layouts.app')

@section('title', '| Create Task')

@section('content')
	<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Add Task</h1>
    <hr>
    @include('errors.lisit')
    @if ($message=Session::get('message')) 
        
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong> 
        
        </div>
    @endif
    {{ Form::open(array('route' => 'tasks.store')) }}
    @csrf
    <div class="form-group">
          <label>Choose the project to add task</label>
             <select class="form-control" id="activity_id" name="activity_id"  >
                <option value="">--SELECT--</option>
                @foreach($activitys as $activity)
                <option value="{{$activity->id}}">{{$activity->name}}</option>
                @endforeach
             </select>
    </div>
    <div class="form-group">
          <label>Status of the Project</label>
             <select class="form-control" id="status" name="status"  >
                <option value="">--SELECT--</option>
                <option value="not started">Not started</option>
                <option value="on track">On track</option>
                <option value="on hold">On hold</option>
                <option value="complete">completed</option>
            
             </select>
    </div>
    
        <div class="form-group">
          {{ Form::label('project_remarks', 'Remark')}}
          <div class="input-group">
            {{ Form::text('progress','',array('class'=>'form-control','placeholder'=>'Remarks of Project status','step'=>'any'))}}
            
          </div>
          
          <div class="form-group">
            <label>Project Monitoring Date:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" name="monitor_date" class="form-control pull-right" id="startdatepicker" placeholder="Activity start Date">
              </div>
          </div> 
      
        </div>

    
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
	


@endsection