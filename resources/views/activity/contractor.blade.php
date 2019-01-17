@extends('layouts.app')

@section('title', '| Activity')

@section('content')
<div class="container">

<div class="col-lg-10 col-lg-offset-1">
    <h1><i class="fa fa-users"></i> Contractor Details </h1>
    <hr>
     
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>SL #</th>
                    <th>Contractor Name</th>
                    <th>Contractor Address</th>
                    <th>Contact Number</th>
                    <th>Project Name</th>
                    
                </tr>
            </thead>
             
             <tbody>
                
                @foreach($activitys as $activity)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $activity->contractor_name }}</td>
                    <td>{{ $activity->contractor_address }}</td>
                    <td>{{ $activity->contractor_phone }}</td>
                    <td>{{ $activity->name }}</td>
                
                </tr>
                @endforeach


            </tbody>

        </table>

    </div>
    <center>{{$activitys->links()}}</center> 

    
</div>
</div>


@endsection
