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
    
    <div class="w3-sidebar w3-dark-grey w3-bar-block" style="width:25%">
    <img src="img/partner.jpg" alt="Profile-pic">
    <div class="side-content">
        <a href="#" class="w3-bar-item w3-button w3-padding-16">Profile</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-16">Resume</a>
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

    
        <button>Edit  <span class="glyphicon glyphicon-cog"></button>
        <h3>Personal Info</h3> 
        <div><img src="" alt=""></div>
        <div>Name:</div>
        <div>Gender:</div>
        <div>Student ID:</div>
        <div>Program:</div>
        <div>Batch No:</div>
        <div>Email:</div>
        <div>Contact:</div>

        <h3>Educational Background</h3>
        <div>University:</div>
        <div>Field of Study:</div>
        <div>Program:</div>
        <div>GPA: </div>
        <div>Year Graduate: </div>
        <div>Relevant Project: </div>
        <div>Result: </div>

    </div>
</div>
@endsection