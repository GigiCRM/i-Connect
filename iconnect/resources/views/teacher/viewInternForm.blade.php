@extends('layouts.studentnav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/internForm.css') }}">
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
 
      

   
<div id="center">
    <div class="info">
        <h3  >Intern Form</h3>
        <div style="display:none;"><em> No:</em> {{$internForm->id}}</div>
        <div><em> Student Name:</em> {{$internForm->studentName}}</div>
        <div><em> Faculty:</em> {{$internForm->faculty}}</div>
        <div><em>Program:</em>  {{$internForm->program}}</div>
        <div><em>Address:</em> {{$internForm->address}}</div>
        <div><em>Contact:</em> {{$internForm->contact}}</div>
        <div><em> Company Name:</em> {{$internForm->companyName}}</div>
        <div><em> Company Address:</em> {{$internForm->companyAddress}}</div>
        <div><em> Job Type:</em> {{$internForm->jobType}}</div>
        <div><em>Job Name:</em>  {{$internForm->jobName}} </div>
        <div><em>Position:</em> {{$internForm->position}}</div>
        <div><em>Salary:</em> {{$internForm->salary}}</div>
        <div id="status" >Status: {{$internForm->status}}</div>


        <div class="btn-row">
    <div class="row">
        <a href="{{route('teacher.approveInternForm', ['id' => $internForm->id])}}" class="btn btn-info" id="button-approve"><i class="fas fa-edit">Approve</i></a>
        <a href="{{route('teacher.rejectInternForm', ['id' => $internForm->id])}}" class="btn btn-info" id="button-decline"><i class="fas fa-edit">Reject</i></a>

    </div>
</div>  
    </div>

     

</div>
    @endforeach
    </div>
</div>
@endsection