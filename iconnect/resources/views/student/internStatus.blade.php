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
        <a href="{{ route('showInternDetail') }}" class="w3-bar-item w3-button w3-padding-16">Intern Status</a>
        <a href="{{ route('student.showEnrolSubject') }}" class="w3-bar-item w3-button w3-padding-16">Classroom</a>
    </div>
    
    </div>
</div>


<!-- Page Content -->
<div class="profile-content" style="margin-left:25%">

<div class="page-content">
    <div class="w3-container w3-light-grey" style="height: 100%;">
    <div id="form" class="col-md-10">

    <form class="subform"  method="post" action="{{ route('add.internStatus') }}" enctype="multipart/form-data" style="border: 1px solid black; margin-top:20px;">
            @csrf  

    <div>Please click the button below to start your intern path.</div>
    <div class="form-group input-group-lg">
                <label for="status" class="text-dark">Status:</label>
                <input type="radio" id="status" name="status" value="Valid">
                    <label for="html">Comfirm</label><br>
                </div>
    <div class="text-center">
                <input type="submit" name="insert"  id="button" class="btn btn-info" value="Comfirm" style="height: 50px; width: 30%; margin-top:20px;" >
    </div>
</form>
</div>
@endforeach
    </div>
</div>
@endsection