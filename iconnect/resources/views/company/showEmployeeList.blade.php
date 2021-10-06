@extends('layouts.companyNav')

@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')

<div class="container">

<div class="row" id="row-adjust" style="float:right; display:block; padding-bottom:10px;" >
            <form action="{{ route('company.searchStudent') }}" method="post"  id="search">
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
                    <th style="display:none;">id</th>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Email </th>
		            <th>Contact</th>
                    <th>University</th>
		            <th>JobName</th>
                    <th>Position</th>
		            <th>Salary</th>
		        </tr>
		    </thead>
		        <tbody>	
                @foreach($employee as $employees)
		            <tr>
		                <td style="display:none;">{{$employees->id}}</td>
                        <td>{{$employees->jobName}}</td>
                        <td>{{$employees->companyName}}</td>
                        <td>{{$employees->publisherId}}</td>
                        <td>{{$employees->position}}</td>
                        <td>{{$employees->salary}}</td>
                        <td>{{$employees->qualification}}</td>
                        <td>{{$employees->location}}</td>
		            </tr> 

                @endforeach
             
		        </tbody>
		    </table>
            <div class="pagination">
                {!! $employee->links() !!}
                </div>
	</div>
    </div>

@endsection
	    