@extends('layouts.studentnav')
@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')

<div class="container">

	    <div class="row" style="display:block;">
		    <table class="table table-hover table-striped">
		        <thead>
		        <tr class="thead-dark">
                    <th></th>
                    <th>Id</th>
		            <th>Job</th>
                    <th>Publisher ID</th>
		            <th>Postion</th>
                    <th>Salary</th>
		            <th>Qualification</th>
                    <th>Location</th>
		            <th>Working Hour</th>
                    <th>Type of Job</th>
                    <th>Description</th>
                    <th>Employee Type</th>
                    <th>Status</th>


		        </tr>
		    </thead>
		        <tbody>	
                @foreach($jobs as $jobs)
		            <tr>
                        <td><img src="{{ asset('img/') }}/{{$jobs->jobImage}}" alt="" width="50"></td>
		                <td>{{$jobs->jobId}}</td>
                        <td>{{$jobs->jobName}}</td>
                        <td>{{$jobs->publisherId}}</td>
                        <td>{{$jobs->jobPosition}}</td>
                        <td>{{$jobs->jobSalary}}</td>
                        <td>{{$jobs->jobQualification}}</td>
                        <td>{{$jobs->jobLocation}}</td>
                        <td>{{$jobs->jobWorkingHour}}</td>
                        <td>{{$jobs->jobTypeOfJob}}</td>
                        <td>{{$jobs->jobDescription}}</td>
                        <td>{{$jobs->jobEmployeeType}}</td>
                        <td>{{$jobs->status}}</td>

		            </tr> 

                   

                @endforeach

				
		        </tbody>
		    </table>

	</div>
    </div>

@endsection