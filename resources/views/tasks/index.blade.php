@extends('layouts.app')

@section('title', '| Create Task')

@section('content')
<div class="container">
	<div class="col-lg-10 col-lg-offset-1">
		 <h1><i class="fa fa-users"></i> Project Task Details </h1>
    	 <hr>
		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Project</th>
		      <th scope="col">Status</th>
		      <th scope="col">Progress (%)</th>
		      <th scope="col">Operation</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($tasks as $task)
		    <tr>
		      <th scope="row">{{$loop->iteration}}</th>
		      <td>{{$task->activity->name}}</td>
		      <td>{{$task->status }}</td>
		      <td>{{$task->progress}}</td>
		      <td>
		      	 <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
	     <center>{{$tasks->links()}}</center> 

</div>
@endsection
