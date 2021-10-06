@extends('layouts.companyNav')
@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')

<div class="container">

<h2>
            <form action="{{ route('company.searchStudent') }}" method="post"  id="search" style="float:right; margin-bottom:15px;">
                @csrf
                <input type="text" name="searchJob" id="searchJob">
                <button class="btn btn-info" type="submit" id="button">Search</button>
            </form>
        </h2>
	    <div class="row" style="display:block;">
		    <table class="table table-hover table-striped">
		        <thead>
		        <tr class="thead-dark">
		            <th style="display:none;">Job Id</th>
                    <th>Job Name</th>
                    <th  style="display:none;">Publisher ID</th>
                    <th>Student Id</th>
                    <th>Name</th>
		            <th>Email</th>
                    <th>Contact</th>
                    <th>Status</th>
                    <th>Action</th>


		        </tr>
		    </thead>
		        <tbody>	
                @foreach($job as $jobs)
		            <tr> 
                        <td  style="display:none;">{{$jobs->jobId}}</td>
                        <td>{{$jobs->JobName}}</td>
                        <td  style="display:none;">{{$jobs->publisherId}}</td>
		                <td>{{$jobs->studentId}}</td>
                        <td>{{$jobs->studentName}}</td>
                        <td>{{$jobs->studentEmail}}</td>
                        <td>{{$jobs->studentContact}}</td>
                        <td>{{$jobs->status}}</td>

                        <td>
                        <a href="{{route('company.approve', ['id' => $jobs->id])}}" class="btn btn-warning">Approve</a>

                        <a href="{{route('company.decline', ['id' => $jobs->id])}}" class="btn btn-danger">Decline</a>

                        </td>

		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>

	</div>
    </div>

@endsection