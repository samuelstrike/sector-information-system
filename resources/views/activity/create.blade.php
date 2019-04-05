@extends('layouts.app')

@section('title', '| Create Activity')

@section('content')
<br>
<div class="container">
  <div class="panel-group">
    <div class="panel panel-primary">
      <div class="panel-heading">Add Activity/Project</div>
      <div class="panel-body">
        @include('errors.lisit')
    @if ($message=Session::get('message')) 
        
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong> 
        
        </div>
    @endif
    {{ Form::open(array('route' => 'activity.store')) }}
    @csrf
    <div class="row">
      <div class="col-lg-6">
          <div class="form-group">
              {{ Form::label('name', 'Activity Name') }}
              {{ Form::text('name', '', array('class' => 'form-control')) }}
          </div>
    </div>
    <div class="col-lg-6">
          <div class="form-group">
              {{ Form::label('location', 'Activity location') }}
              {{ Form::text('location', '', array('class' => 'form-control')) }}
          </div>
    </div>
    </div>
    <div class="row">
      <!--<div class="col-lg-4">
          <div class="form-group">
            <label>Financial Year:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" class="form-control pull-right" id="">
              </div>
          </div> 
      </div>-->
      <div class="col-lg-6">
          <div class="form-group">
            <label>Start Date:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" name="start_date" class="form-control pull-right" id="startdatepicker" placeholder="Activity start Date">
              </div>
          </div> 
      </div>
      <div class="col-lg-6">
          <div class="form-group">
            <label>End Date:</label>
              <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="text" name='end_date' value='' class="form-control pull-right" id="enddatepicker" placeholder="completion date">
              </div>
          </div> 
      </div>  
    </div>
    <div class="row">
      <div class="col-lg-4">
         <div class="from-group">
            {{ Form::label('total_budget', 'Total Budget') }}
            <div class="input-group">
              <span class="input-group-addon">Nu</span>
              {{ Form::number('total_budget', '', array('class' => 'form-control','placeholder'=>'total amount(in million)','step'=>'any')) }}
            </div>
          </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('est_budget', 'Estimated Budget') }}
            <div class="input-group">
              <span class="input-group-addon">Nu</span>
              {{ Form::number('est_budget', '', array('class' => 'form-control','placeholder'=>'estimated amount(in million)','step'=>'any')) }}
            </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
            {{ Form::label('bid_amount', 'Bid Amount') }}
            <div class="input-group">
              <span class="input-group-addon">Nu</span>
              {{ Form::number('bid_amount', '', array('class' => 'form-control','placeholder'=>'Bid amount(in million)','step'=>'any')) }}
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          {{ Form::label('physical_progress', 'Physical Progress')}}
          <div class="input-group">
            {{ Form::number('physical_progress','',array('class'=>'form-control','placeholder'=>'Activity Progress physically','step'=>'any'))}}
            <span class="input-group-addon">%</span>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          {{ Form::label('financial_progress', 'Financial Progress')}}
          <div class="input-group">
              <span class="input-group-addon">Nu</span>
              {{ Form::number('financial_progress','',array('class'=>'form-control','placeholder'=>'Activity Progress Financially','step'=>'any'))}}
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Contractor Name</label>
             <select style="width: 200px" class="form-control" id="contractor_name" name="contractor_name"  >
                <option value="">--SELECT--</option>
                @foreach($contractors as $contractor)
                <option value="{{$contractor->id}}">{{$contractor->name}}-cdb({{$contractor->cdb}})</option>
                @endforeach
             </select>
        </div>
      </div>
      <!--
      <div class="col-lg-4">
        <div class="form-group">
          {{ Form::label('contractor_address', 'Contractor Address')}}
          {{ Form::text('contractor_address','',array('class'=>'form-control','placeholder'=>'Contractor Address'))}}
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          {{ Form::label('contractor_phone', 'Contractor Phone #')}}
          {{ Form::number('contractor_phone','',array('class'=>'form-control','placeholder'=>'Contractor Mobile nos'))}}
        </div>
      </div>-->
    </div>
    <div class="form-group">
        {{ Form::label('remarks', 'Remarks') }}
        {{ Form::textarea('remarks', '', array('class' => 'form-control','placeholder'=>'remarks if any','rows'=>'5')) }}
    </div>
    <div class="form-group">
      {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
      {{ Form::close() }}
    </div> 
      </div>
    </div>
  </div>
</div>
@endsection

  