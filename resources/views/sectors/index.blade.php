@extends('layouts.app')

@section('title', '| Create Sector')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> Sector Administration </h1>
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
                    <th>Sector Name</th>
                    <th>Sector Head</th>
                    <th>CID</th>
                    @can('Edit Sector')
                    <th>Operations</th>
                    @endcan
                </tr>
            </thead>
             
             <tbody>
                
                @foreach($sectors as $sector)

                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $sector->sector_name }}</td>
                    <td>{{ $sector->sector_head }}</td>
                    <td>{{ $sector->cid }}</td>
                    <td>
                    @can('Edit Sector')
                   	<a href="{{ route('sectors.edit', $sector->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
                    @endcan
                    @can('Delete Sector')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['sectors.destroy', $sector->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    @endcan
                    {!! Form::close() !!}
                   </td>	 
                </tr>
                @endforeach


            </tbody>

        </table>
    @can('Create Sector')
    <a href="{{ route('sectors.create') }}" class="btn btn-success">Add Sector</a>    
    @endcan
    </div>
    {{$sectors->links()}}

</div>


@endsection
