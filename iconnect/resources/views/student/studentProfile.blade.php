@extends('layouts.studentnav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
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
        <a href="{{ route('showInternStatus') }}" class="w3-bar-item w3-button w3-padding-16">Intern Status</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-16">Weekly Task</a>
        <a href="#" class="w3-bar-item w3-button w3-padding-16">Classroom</a>
    </div>
    
    </div>
</div>


<!-- Page Content -->
<div class="profile-content" style="margin-left:25%">

<div class="page-content">
    <div class="w3-container w3-light-grey" id="info-background">
    <a href="{{route('editStudentProfile', ['id' => $students->id])}}" class="btn btn-warning" id="button"><i class="fas fa-edit">Edit</i></a>

   
<div id="center">
    <div class="info">
        <h3 style="background-color:carol;" >Personal Info</h3> 
        <div><img src="{{ asset('img/') }}/{{$students->Image}}"  alt=""></div>
        <div><em> Name:</em> {{$students->Name}}</div>
        <div><em> Gender:</em> {{$students->Gender}}</div>
        <div><em>Student ID:</em>  {{$students->StudentID}}</div>
        <div><em> Program:</em> {{$students->Program}}</div>
        <div><em> Batch No:</em> {{$students->Batch_No}}</div>
        <div><em> Email:</em> {{$students->Email}}</div>
        <div><em>Contact:</em>  {{$students->Contact}}</div>

        <h3 style="margin: top 25px;background-color:carol;">Educational Background</h3>
        <div><em> University:</em> {{$students->University}}</div>
        <div><em> Field of Study:</em> {{$students->FieldOfStudy}}</div>
        <div><em> Program:</em> {{$students->Program}}</div>
        <div><em> GPA:</em> {{$students->GPA}}</div>
        <div><em>Year Graduate:</em>  {{$students->YearGraduate}} </div>
        <div><em> Relevant Project:</em><br><img src="{{ asset('img/') }}/{{$students->RelevantProject}}"  alt=""></div>
        <div><em> Result:</em><br><img src="{{ asset('img/') }}/{{$students->Result}}"  alt=""></div>
    </div>
</div>
    @endforeach
    </div>
</div>
@endsection