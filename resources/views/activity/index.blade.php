@extends('layouts.app')

@section('title', '| Activity')

@section('content')
<div class="container">

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> Project </h1>
    <hr>
     @if (session()->has('message')) 

        <div class="alert alert-danger">
            {{session()->get('message')}}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>SL #</th>
                    <th>Project/Activity</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Location</th>
                    <th>Total Budget(m)</th>
                    <th>Physical Progress(%)</th>
                    <th>Financial Progress(m)</th>
                    @can('Edit Activity')
                    <th>Operations</th>
                    @endcan
                </tr>
            </thead>
             
             <tbody>
                
                @foreach($activitys as $activity)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->name }}</td>
                    <td>{{ $activity->start_date }}</td>
                    <td>{{ $activity->end_date }}</td>
                    <td>{{ $activity->location }}</td>
                    <td>{{ $activity->total_budget }}</td>
                    <td>{{ $activity->physical_progress }}</td>
                    <td>{{ $activity->financial_progress }}</td>
                    <td>
                     @can('Edit Activity')   
                    <a href="{{ route('activity.edit', $activity->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                     @endcan
                     @can('Delete Activity')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['activity.destroy', $activity->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                     @endcan
                    {!! Form::close() !!}
                   </td>
                </tr>
                @endforeach


            </tbody>

        </table>
        @can('Create Activity')
            <a href="{{ route('activity.create') }}" class="btn btn-success">Add Project/Activity</a>    
        @endcan
    </div>
    <center>{{$activitys->links()}}</center> 

    
</div>
</div>


@endsection
