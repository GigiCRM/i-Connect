@extends('layouts.studentnav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">

@section('content')
<!-- Sidebar -->
<div class="sidebar">
@foreach($students as $students)
    <div class="w3-sidebar w3-dark-grey w3-bar-block" style="width:25%">
    <img src="{{ asset('img/') }}/{{$students->Image}}"  alt="">
    <div class="side-content">
        <a href="{{ route('showStudentProfile') }}" class="w3-bar-item w3-button w3-padding-16">Profile</a>
        <a href="{{ route('showStudentResume') }}" class="w3-bar-item w3-button w3-padding-16">Resume</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-16">Intern Status</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-16">Weekly Task</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-16">Classroom</a>
    </div>
    
    </div>
</div>


<!-- Page Content -->
<div class="profile-content" style="margin-left:25%">

<div class="page-content">
    <div class="w3-container w3-light-grey" style="height: 100%;">
   

    <a href="{{route('editStudentProfile', ['id' => $students->id])}}" class="btn btn-warning"><i class="fas fa-edit">Edit</i></a> | 
        <h3>Personal Info</h3> 
        <div><img src="{{ asset('img/') }}/{{$students->Image}}"  alt=""></div>
        <div>Name: {{$students->Name}}</div>
        <div>Gender: {{$students->Gender}}</div>
        <div>Student ID: {{$students->StudentID}}</div>
        <div>Program: {{$students->Program}}</div>
        <div>Batch No: {{$students->Batch_No}}</div>
        <div>Email: {{$students->Email}}</div>
        <div>Contact: {{$students->Contact}}</div>

        <h3>Educational Background</h3>
        <div>University: {{$students->University}}</div>
        <div>Field of Study: {{$students->FieldOfStudy}}</div>
        <div>Program: {{$students->Program}}</div>
        <div>GPA: {{$students->GPA}}</div>
        <div>Year Graduate: {{$students->YearGraduate}} </div>
        <div>Relevant Project:<img src="{{ asset('img/') }}/{{$students->RelevantProject}}"  alt=""></div>
        <div>Result:<img src="{{ asset('img/') }}/{{$students->Result}}"  alt=""></div>
    @endforeach
    </div>
</div>
@endsection