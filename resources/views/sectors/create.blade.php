@extends('layouts.app')

@section('title', '| Create Sector')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Add Sector</h1>
    <hr>
    @include('errors.lisit')
    @if ($message=Session::get('message')) 
        
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong> 
        
        </div>
    @endif
    {{ Form::open(array('route' => 'sectors.store')) }}
    @csrf
    <div class="form-group">
        {{ Form::label('cid', 'Sector Head CID nos') }}
        {{ Form::text('cid', '', array('class' => 'form-control')) }}
    </div> 
    <div class="form-group">
        {{ Form::label('sector_name', 'Sector Name') }}
        {{ Form::text('sector_name', '', array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('sector_head', 'Sector Head') }}
        {{ Form::text('sector_head', '', array('class' => 'form-control')) }}
    </div>
    



    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>



@endsection
