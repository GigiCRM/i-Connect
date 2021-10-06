@extends('layouts.adminNav')
@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')
<div class="container">

<div class="row" id="row-adjust" style="float:right; display:block; padding-bottom:10px;" >
            <form action="{{ route('admin.searchSubject') }}" method="post"  id="search">
                @csrf
                <input type="text" name="searchJob" id="searchJob" style="height:30px; width:200px;">
                <button class="btn btn-info" type="submit" id="button" style="height:30px; width:70px; font-size:14px;">Search</button>
            </form>
</div>

	    <div class="row" style="display:block;">
		    <table class="table table-hover table-striped">
		        <thead>
		        <tr class="thead-dark">
		            <th style="display:none;">Creator Id</th>
                    <th>Subject Name</th>
		            <th>Subject Code</th>
                    <th>Lecturer id</th>
		            <th>Lecturer Email</th>
                    <th>Faculty</th>
		            <th>Available Student</th>
                    <th>Action</th>


		        </tr>
		    </thead>
		        <tbody>	
                @foreach($enrolmentSubjects as $enrolmentSubject)
		            <tr>
                        
		                <td style="display:none;">{{$enrolmentSubject->creatorId}}</td>
                        <td>{{$enrolmentSubject->subjectName}}</td>
                        <td>{{$enrolmentSubject->subjectCode}}</td>
                        <td>{{$enrolmentSubject->lecturerId}}</td>
                        <td>{{$enrolmentSubject->lecturerEmail}}</td>
                        <td>{{$enrolmentSubject->faculty}}</td>
                        <td>{{$enrolmentSubject->availableNo}}</td>
                        <td><a href="{{route('editEnrolmentSubject', ['id' => $enrolmentSubject->id])}}" class="btn btn-warning" id="button">Edit</a>
                            <a href="{{route('delete.EnrolmentSubjectList', ['id' => $enrolmentSubject->id])}}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</a>

                        
                        </td>

		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>
            <div class="pagination">
                {!! $enrolmentSubjects->links() !!}
            </div>
	</div>
    </div>

@endsection