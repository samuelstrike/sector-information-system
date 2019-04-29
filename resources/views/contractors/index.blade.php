@extends('layouts.app')

@section('title', '| Create Contractor')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> Contractor List </h1>
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
                    <th>Contractor Name</th>
                    <th>Contractor Address</th>
                    <th>Contact Number</th>
                    <th>CDB Number</th>
                    @can('Edit Contractor')
                    <th>Operation</th>
                    @endcan
                </tr>
            </thead>
             
             <tbody>
                
                @foreach($contractors as $contractor)

                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $contractor->name }}</td>
                    <td>{{ $contractor->address }}</td>
                    <td>{{ $contractor->phone }}</td>
                    <td>{{ $contractor->cdb }}</td>
                    <td>
                    @can('Edit Contractor')
                   	<a href="{{ route('contractors.edit', $contractor->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    @endcan
                    @can('Delete Contractor')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['contractors.destroy', $contractor->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    @endcan
                    {!! Form::close() !!}
                   </td>	 
                </tr>
                @endforeach


            </tbody>

        </table>
        @can('Create Contractor')
            <a href="{{ route('contractors.create') }}" class="btn btn-success">Add Contractor</a>    
        @endcan
    </div>
    {{$contractors->links()}}

</div>


@endsection
