@extends('layouts.alumniNav')
@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')

<div class="container">
	    <div class="row">
		    <table class="table table-hover table-striped">
		        <thead>
		        <tr class="thead-dark">
		            <th>Job Id</th>
                    <th>Job Name</th>
                    <th>Publisher ID</th>
                    <th>Student Id</th>
                    <th>Name</th>
		            <th>Email</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Action</th>


		        </tr>
		    </thead>
		        <tbody>	
                @foreach($jobs as $jobs)
		            <tr> 
                        <td>{{$jobs->jobId}}</td>
                        <td>{{$jobs->JobName}}</td>
                        <td>{{$jobs->publisherId}}</td>
		                <td>{{$jobs->studentId}}</td>
                        <td>{{$jobs->studentName}}</td>
                        <td>{{$jobs->studentEmail}}</td>
                        <td>{{$jobs->studentContact}}</td>
                        <td>{{$jobs->status}}</td>

                        <td>
                        <a href="{{route('acceptJobRequest', ['id' => $jobs->id])}}" class="btn btn-warning">Accept</a>

                        <a href="{{route('declineJobRequet', ['id' => $jobs->id])}}" class="btn btn-danger">Decline</a>

                        </td>

		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>

	</div>
    </div>

@endsection