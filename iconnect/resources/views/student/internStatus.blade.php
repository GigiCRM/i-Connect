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
        <a href="{{ route('insert.internStatus') }}" class="w3-bar-item w3-button w3-padding-16">Intern Status Selection</a>
        <a href="{{ route('showInternStatus') }}" class="w3-bar-item w3-button w3-padding-16">Intern Status</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-16">Weekly Task</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-16">Classroom</a>
    </div>
    
    </div>
</div>


<!-- Page Content -->
<div class="profile-content" style="margin-left:25%">

<div class="page-content">
    <div class="w3-container w3-light-grey" style="height: 100%;">
   
    <form class="subform"  method="post" action="{{ route('add.internStatus') }}" enctype="multipart/form-data">
            @csrf  

    <div>Please click the button below to start your intern process.</div>
    <div class="form-group input-group-lg">
                <label for="status" class="text-info">Status:</label><br>
                <input type="radio" id="status" name="status" value="Valid">
                    <label for="html">Comfirm</label><br>
                </div>
    <div class="text-center">
                <input type="submit" name="insert"  id="button" class="" value="Comfirm" style="height: 50px; width: 30%;" >
    </div>
@endforeach
    </div>
</div>
@endsection