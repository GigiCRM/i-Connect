@extends('layouts.companyNav')

@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')

<div class="container">

<div class="row" id="row-adjust" style="float:right; display:block; padding-bottom:10px;" >
            <form action="{{ route('company.searchJobList') }}" method="post"  id="search">
                @csrf
                <input type="text" name="searchJob" id="searchJob" style="height:30px; width:200px;">
                <button class="btn btn-info" type="submit" id="button" style="height:30px; width:70px; font-size:14px;">Search</button>
            </form>
</div>
	    <div class="row" style="display:block;">
		    <table class="table table-hover table-striped">
		        <thead>
		        <tr class="thead-dark">
                    <th></th>
                    <th style="display:none;">Job Id</th>
                    <th>Job Name</th>
                    <th>Company Name</th>
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
                    <th>Action</th>


		        </tr>
		    </thead>
		        <tbody>	
                @foreach($job as $jobs)
		            <tr>
                        <td><img src="{{ asset('img/') }}/{{$jobs->image}}" alt="" width="50"></td>
		                <td style="display:none;">{{$jobs->id}}</td>
                        <td>{{$jobs->jobName}}</td>
                        <td>{{$jobs->companyName}}</td>
                        <td>{{$jobs->publisherId}}</td>
                        <td>{{$jobs->position}}</td>
                        <td>{{$jobs->salary}}</td>
                        <td>{{$jobs->qualification}}</td>
                        <td>{{$jobs->location}}</td>
                        <td>{{$jobs->workingHour}}</td>
                        <td>{{$jobs->typeOfJob}}</td>
                        <td>{{$jobs->description}}</td>
                        <td>{{$jobs->employeeType}}</td>
                        <td>{{$jobs->status}}</td>
                        <td>
                        <a href="{{route('company.editJob', ['id' => $jobs->id])}}" class="btn btn-secondary">Edit</a>
                        <a href="{{route('company.deleteJob', ['id' => $jobs->id])}}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</a>

                        
                        </td>

		            </tr> 

                @endforeach
             
		        </tbody>
		    </table>
            <div class="pagination">
                {!! $job->links() !!}
                </div>
	</div>
    </div>

@endsection
	    