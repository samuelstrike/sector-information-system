@extends('layouts.app')

@section('content')


<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="panel panel-primary">
            

                <div class="panel-heading">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Welcome {{ auth()->user()->name}} !</h5>
                </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>
                {{$activitys->count()}}
              </h3>
              <p>total project/activities</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route('activity.index')}}" class="small-box-footer">
              "More info" <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$sectors->count()}}</h3>
              <p>total sectors</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('sectors.index')}}" class="small-box-footer">
              "More info" <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$activitys->count()}}</h3>
              <p>Ongoing Project</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              "More info" <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$contractors->count()}}</h3>
              <p>Contractors</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('contractors.index')}}" class="small-box-footer">
              "More info" <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Projects</h3>
        </div>
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tbody>
                <tr>
                    <th>SL #</th>
                    <th>Project Name</th>
                    <th>Sector</th>
                    <th>Project Manager</th>
                    <th>location</th>
                    <th>Status</th>
                </tr>
            </tbody>
            <tbody>
                @foreach($activitys as $activity)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$activity->name}}</td>
                  <td>{{$activity->user->sector->sector_name}}</td>
                  <td>{{$activity->user->name}}</td>
                  <td>{{$activity->location}}</td>
                  <td>{{$activity->task}}</td>
                  <td></td>
                </tr>
        
                @endforeach
              
                

        
            </tbody>

        </table>
        </div>
        
        <center>{{$activitys->links()}}</center> 
    </div>
    </div>

    </section>

@endsection
