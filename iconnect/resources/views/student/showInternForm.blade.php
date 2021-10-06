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

@foreach($internForm as $internForm)
  

<!-- Page Content -->
<div class="profile-content">

<div class="page-content">
    <div class="w3-container w3-light-grey" id="info-background">
    <a href="{{route('student.editInternForm', ['id' => $internForm->id])}}" class="btn btn-warning" id="button" style="border: 1px solid black;"><i class="fas fa-edit">Edit</i></a>
    <div id="internForm-status" >Status: {{$internForm->status}}</div> 
      

   
<div id="center">
    <div class="info">
        <h3 style="background-color:carol;" >Intern Form</h3> 
        <div><em> Student Name:</em> {{$internForm->studentName}}</div>
        <div><em> faculty:</em> {{$internForm->faculty}}</div>
        <div><em>Program:</em>  {{$internForm->program}}</div>
        <div><em>Address:</em> {{$internForm->address}}</div>
        <div><em>Contact:</em> {{$internForm->contact}}</div>
        <div><em> Company Name:</em> {{$internForm->companyName}}</div>
        <div><em> Company Address:</em> {{$internForm->companyAddress}}</div>
        <div><em> Job Type:</em> {{$internForm->jobType}}</div>
        <div><em>Job Name:</em>  {{$internForm->jobName}} </div>
        <div><em>Position:</em> {{$internForm->position}}</div>
        <div><em>Salary:</em> {{$internForm->salary}}</div>

    </div>
</div>
    @endforeach
    </div>
</div>
@endsection