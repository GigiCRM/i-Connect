@extends('layouts.studentnav')
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
                    <th>Action</th>


		        </tr>
		    </thead>
		        <tbody>	
                @foreach($jobs as $jobs)
		            <tr>
                        <td><img src="{{ asset('img/') }}/{{$jobs->image}}" alt="" width="50"></td>
		                <td>{{$jobs->id}}</td>
                        <td>{{$jobs->jobName}}</td>
                        <td>{{$jobs->publisherId}}</td>
                        <td>{{$jobs->position}}</td>
                        <td>{{$jobs->salary}}</td>
                        <td>{{$jobs->qualification}}</td>
                        <td>{{$jobs->location}}</td>
                        <td>{{$jobs->workingHour}}</td>
                        <td>{{$jobs->typeOfJob}}</td>
                        <td>{{$jobs->description}}</td>
                        <td>{{$jobs->employeeType}}</td>
                        <td> <input type="hidden" name="id" id="id" value="{{$jobs->id}}"><a href="{{route('applyJob')}}" class="btn btn-warning">Apply</a></td>

		            </tr> 

                   

                @endforeach

				
		        </tbody>
		    </table>

	</div>
    </div>

@endsection