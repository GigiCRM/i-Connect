@extends('layouts.adminNav')
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
                    
		            <th>User ID</th>
					<th>Student Name</th>
					<th>Student ID</th>
					<th>Email</th>
                    <th>Intern Status</th>
                    <th>Action</th>
		         
		        </tr>
		    </thead>
		        <tbody>	
                @foreach($internStatus as $internStatus)
		            <tr>
                      
		                <td>{{$internStatus->studentId}}</td>
                        <td>{{$internStatus->studentName}}</td>
						<td>{{$internStatus->studentID}}</td>
						<td>{{$internStatus->studentEmail}}</td>
						<td>{{$internStatus->status}}</td>
                        <td><a href="{{route('editStudentInternStatus', ['id' => $internStatus->id])}}"> <button>Edit</button></a></td>
                       
		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>

	</div>
    </div>

@endsection