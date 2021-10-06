@extends('layouts.teacherNav')
<link rel="stylesheet" href="{{ asset('css/subjectList.css') }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Besley&display=swap" rel="stylesheet">

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
                    <th>No</th>
                    <th>Id</th>
		            <th>Name </th>
                    <th>Batch No</th>
                    <th>Email</th>
		            <th>Contact</th>
                    <th>Program</th>
                    <th>Action</th>



		        </tr>
		    </thead>
		        <tbody>	
                @foreach($students as $students)
		            <tr>
                        <td>{{$students->id}}</td>
		                <td>{{$students->studentId}}</td>
                        <td>{{$students->sName}}</td>
                        <td>{{$students->sBatch_No}}</td>
                        <td>{{$students->sEmail}}</td>
                        <td>{{$students->sContact}}</td>   
                        <td>{{$students->sFieldOfStudy}}</td>   
                        <td>
                            
                        <a href="{{route('teacher.viewReport', ['studentId' => $students->studentId])}}" ><button id="button"class="btn btn-info" >Weekly Log</button> </a>
                        <a href="{{route('teacher.viewInternForm', ['studentId' => $students->studentId])}}" ><button id="button" class="btn btn-info">Intern Form</button> </a>
                        <a href="{{route('insertMessage', ['studentId' => $students->studentId])}}" ><button id="button" class="btn btn-info" style="display:none;">Send Message</button> </a>

                        
                        </td>   
                        
		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>

	</div>
    </div>

@endsection