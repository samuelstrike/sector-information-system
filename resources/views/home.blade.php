@extends('layouts.app')

@section('script')

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js "></script>




<style type="text/css">
    .box{
      width: 600px;
      margin:0 auto;
    }

  </style>
  <script type="text/javascript">
    var analytics = @json($array);

    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart()
    {
      var data=google.visualization.arrayToDataTable(analytics);
      
      var options={

        title: 'ALL PROJECT STATUS IN PERCENTAGE',
          is3D: true,
      }; 
      var chart= new google.visualization.PieChart(document.getElementById('pie_chart'));
      chart.draw(data, options);
    }

    
   
  </script>

  
  


@endsection
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
              <p>On Project</p>
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
      
        
          <div class="panel-group">
            <div class="panel panel-primary">
              <div class="panel-heading">PROJECT</div>
              <div class="panel-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered" id="myTable">
            <thead>
              <tr>
                <th>Project Name</th>
                <th>Sector</th>
                <th>Sector Head</th>
                <th>Engineer</th>
                <th>location</th>
                <th>Status</th>
                <th>Remarks</th>
                <th>Monitored Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach($activitys as $activity)
                <tr>
                  <td>{{$activity->name}}</td>
                  <td>{{$activity->user->sector->sector_name}}</td>
                  <td>{{$activity->user->sector->sector_head}}</td>
                  <td>{{$activity->user->name}}</td>
                  <td>{{$activity->location}}</td>
                  @foreach ($activity->task as $activity_task)
                  <td>{{ $activity_task->status }}</td> 
                  <td>{{ $activity_task->progress }}</td>
                  <td>{{ $activity_task->monitor_date }}</td>
                  @endforeach
                </tr>
        
                @endforeach
            </tbody>
    
        </table>
      </div>
              </div>
            </div>
          </div>
            
       
        
      
      
      
    <div class="col-md-6">
     
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Project Status (%)</h3>
      </div>
      <div class="panel-body">
        <div id="pie_chart" style="width:530px; height:392px;">
          
        </div>
      </div>
    </div>
    </div>
    </section>

@endsection
