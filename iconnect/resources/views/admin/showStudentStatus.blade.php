@extends('layouts.adminNav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/showStudentStatus.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">

@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')

<div class="container">

<div class="row" id="row-adjust" style="float:right; display:block; padding-bottom:10px;" >
            <form action="{{ route('admin.searchInternStatus') }}" method="post"  id="search">
                @csrf
                <input type="text" name="searchJob" id="searchJob" style="height:30px; width:200px;">
                <button class="btn btn-info" type="submit" id="button" style="height:30px; width:70px; font-size:14px;">Search</button>
            </form>
</div>
	    <div class="row" style="display:block;">
		    <table class="table table-hover table-striped">
		        <thead>
		        <tr class="thead-dark">
                    
		            <th style="display:none">User ID</th>
					<th>Student Name</th>
					<th>Student ID</th>
					<th>Program</th>
					<th>Faculty</th>
					<th>Email</th>
                    <th>Intern Status</th>
                    <th>Action</th>
		         
		        </tr>
		    </thead>
		        <tbody>	
                @foreach($internStatuss as $internStatus)
		            <tr>
                      
		                <td style="display:none">{{$internStatus->studentId}}</td>
                        <td>{{$internStatus->studentName}}</td>
						<td>{{$internStatus->studentID}}</td>
						<td>{{$internStatus->Program}}</td>
						<td>{{$internStatus->FieldOfStudy}}</td>
						<td>{{$internStatus->studentEmail}}</td>
						<td>{{$internStatus->status}}</td>
                        <td><a href="{{route('editStudentInternStatus', ['id' => $internStatus->id])}}"> <button class="btn-info text-dark">Edit</button></a></td>
                       
		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>
			<div class="pagination">
                {!! $internStatuss->links() !!}
            </div>
	</div>
    </div>

@endsection