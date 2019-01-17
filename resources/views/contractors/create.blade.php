@extends('layouts.app')

@section('title', '| create contractor')

@section('content')
<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Add Contractor</h1>
    <hr>
    @include('errors.lisit')
    @if ($message=Session::get('message')) 
        
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong> 
        
        </div>
    @endif
    {{ Form::open(array('route' => 'contractors.store')) }}
    @csrf
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control','placeholder'=>'Contractors Name')) }}
    </div> 
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', '', array('class' => 'form-control','placeholder'=>'Contractors Address')) }}
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'Contact Number') }}
        {{ Form::number('phone', '', array('class' => 'form-control','step'=>'any','placeholder'=>'Mobile Number')) }}
    </div>
    <div class="form-group">
        {{ Form::label('cdb', 'CDB Number') }}
        {{ Form::number('cdb', '', array('class' => 'form-control','step'=>'any','placeholder'=>'Contractors CDB Nos')) }}
    </div>
    



    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>


@endsection