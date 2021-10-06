@extends('layouts.studentnav')

<link rel="stylesheet" href="{{ asset('css/studentViewEnrolmentSubject.css') }}">
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

<div>
<form action="{{ route('student.searchSubjectList') }}" method="post"  id="search" style="display:block; float:right; margin-bottom:20px;">
                @csrf
                <input type="text" name="searchJob" id="searchJob" style="width:200px; height:28px">
                <button class="btn btn-info" type="submit" id="button-edit" style="font-size:12px; width:100px; margin-left:10px ;margin-right:50px;">Search</button>
            </form>
    <div class="row">
    @foreach($enrolmentSubjects as $enrolmentSubject)
        <div class="col-md-4" id="card-body">
            
                <div class="title" >{{$enrolmentSubject->subjectName}}</div>
                <div>Subject Code:{{$enrolmentSubject->subjectCode}}</div>
                <div>Lecturer Id: {{$enrolmentSubject->lecturerId}}</div>
                <div>Lecturer Email: {{$enrolmentSubject->lecturerEmail}}</div>
                <div>Faculty: {{$enrolmentSubject->faculty}}</div>
                <div>Available student:  {{$enrolmentSubject->availableNo}}</div>
        

                <a href="{{route('student.enrollSubject', ['id' => $enrolmentSubject->id])}}" ><button id="button" >Enroll </button> </a>
            
        </div>
        @endforeach
    </div>
    
    
</div>
@endsection