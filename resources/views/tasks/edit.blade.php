@extends('layouts.app')

@section('title', '| Edit Task')

@section('content')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit Task</h1>
        <hr>
            {{ Form::model($task, array('route' => array('tasks.update', $task->id), 'method' => 'PUT')) }}
            <div class="form-group"> 
             <label>Status of the Project</label>
             <select class="form-control" id="status" name="status"  >
                <option value="not started">Not started</option>
                <option value="on track">On track</option>
                <option value="on hold">On hold</option>
                <option value="complete">complete</option>
            
             </select>
            </div>
            <div class="form-group">
                {{ Form::label('project_remarks', 'Remark')}}
                <div class="input-group">
                {{ Form::text('progress','',array('class'=>'form-control','placeholder'=>'Remarks of Project status','step'=>'any'))}}
               
          </div>
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

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    </div>
    </div>
</div>

@endsection