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
                {{ Form::label('project_progress', 'Project Progress')}}
                <div class="input-group">
                {{ Form::number('progress','',array('class'=>'form-control','placeholder'=>'Activity Progress physically','step'=>'any'))}}
                <span class="input-group-addon">%</span>
          </div>
        </div>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    </div>
    </div>
</div>

@endsection