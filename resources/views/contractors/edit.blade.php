@extends('layouts.app')

@section('title', '| Update Contractor Detail')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Update Contractor Detail</h1>
    <hr>
    @include('errors.lisit')  
    @if (session()->has('message')) 

        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss>x</button>
            {{session()->get('message')}}
        </div>
    @endif
    

    {{ Form::model($contractor, array('route'=>array('contractors.update',$contractor->id), 'method'=>'PUT' ))}}
    
    <div class="form-group">
        {{ Form::label('name','Name') }}
        {{ Form::text('name', $contractor->name, array('class' => 'form-control')) }}
    </div> 
    <div class="form-group">
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', $contractor->address, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'Mobile Number') }}
        {{ Form::text('phone', $contractor->phone, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('cdb', 'CDB Number') }}
        {{ Form::text('cdb', $contractor->cdb, array('class' => 'form-control')) }}
    </div>
    



    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>



@endsection
