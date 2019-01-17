@extends('layouts.app')

@section('title', '| Update Sector')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-user-plus'></i> Update Sector</h1>
    <hr>
    @include('errors.lisit')  
    @if (session()->has('message')) 

        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss>x</button>
            {{session()->get('message')}}
        </div>
    @endif
    

    {{ Form::model($sector, array('route'=>array('sectors.update',$sector->id), 'method'=>'PUT' ))}}
    
    <div class="form-group">
        {{ Form::label('cid','Sector Head CID nos') }}
        {{ Form::text('cid', $sector->cid, array('class' => 'form-control')) }}
    </div> 
    <div class="form-group">
        {{ Form::label('sector_name', 'Sector Name') }}
        {{ Form::text('sector_name', $sector->sector_name, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('sector_head', 'Sector Head') }}
        {{ Form::text('sector_head', $sector->sector_head, array('class' => 'form-control')) }}
    </div>
    



    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>



@endsection
