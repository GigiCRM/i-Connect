
@extends('layouts.studentnav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/studentShowEnrolSubject.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

@section('content')
<!-- Sidebar -->
<div class="sidebar">
@foreach($students as $students)
    <div class="w3-sidebar w3-dark-grey w3-bar-block" style="width:25%">
    <img src="{{ asset('img/') }}/{{$students->Image}}"  alt="">
    <div class="side-content">
        <a href="{{ route('showStudentProfile') }}" class="w3-bar-item w3-button w3-padding-16">Profile</a>
        <a href="{{ route('showStudentResume') }}" class="w3-bar-item w3-button w3-padding-16">Resume</a>
        <a href="{{ route('insert.internStatus') }}" class="w3-bar-item w3-button w3-padding-16">Intern Status Selection</a>
        <a href="{{ route('showInternDetail') }}" class="w3-bar-item w3-button w3-padding-16">Intern Status</a>
        <a href="{{ route('student.showEnrolSubject') }}" class="w3-bar-item w3-button w3-padding-16">Classroom</a>
    </div>
    
    </div>
</div>


<!-- Page Content -->
<div class="profile-content" >

    <div class="page-content">
        <div class="w3-container w3-light-grey" id="info-background">
      

	   
                <div id="center">
                    <div class="">
                        <div class="underline-title" style="   font-size: 20px;
        text-decoration: underline; font-weight:bold;">Classroom Detail</div>

                    <div class="row">

                            <div class="col-md-6" id="card-body">
                                
                                    <div class="title">{{$students->subjectName}}</div>
                                    <div>SubjectId: {{$students->SsubjectId}}</div>
                                    <div>Subject Code:{{$students->subjectCode}}</div>
                                    <div>Lecturer Id: {{$students->lecturerId}}</div>
                                    <div>Lecturer Email: {{$students->lecturerEmail}}</div>
                                    <div>Faculty: {{$students->faculty}}</div>
                                    <div>Available student:  {{$students->availableNo}}</div>
                                        
                            </div>

                        
                </div>

                <div class="row">
                    <div class="col-md-6" id="card-body">
                        
                    <a href="{{route('student.showClassroomPost', ['id' => $students->SsubjectId])}}" ><button id="button" >Classroom Post </button> </a>
                    <a href="{{route('student.insertReport')}}" ><button id="button" >Weekly Report submission</button> </a>
                    <a href="{{route('student.insertInternForm')}}" ><button id="button" >Intern form submission</button> </a>
                    <a href="{{route('student.showInternForm')}}" ><button id="button" style="margin-bottom:20px;" >View Intern Form status</button> </a>

                                
                    </div>
                </div>
        </div>
    </div>
    @endforeach
    </div>
</div>
@endsection