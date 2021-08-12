@extends('layouts.adminNav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">

@section('content')


<!-- Page Content -->
<div class="profile-content">

<div class="page-content">
    <div class="w3-container w3-light-grey" style="height: 100%;">
   
    <form class="subform"  method="post" action="{{ route('update.EnrolmentSubjectList') }}" enctype="multipart/form-data">
            @csrf  


    @foreach($enrolmentSubject as $enrolmentSubject)
    
                    <div id="content-item">
                        <label for="id" class="">Id: </label><br>
                        <input type="text" name="id" id="id" value="{{$enrolmentSubject->id}}" readonly>
                    </div>

                    <div id="content-item">
                        <label for="creatorId" class="">Creator Id: </label><br>
                        <input type="text" name="creatorId" id="creatorId" value="{{$enrolmentSubject->creatorId}}" readonly>
                    </div>

                    <div id="content-item">
                        <label for="subjectName" class="">Subject Name: </label><br>
                        <input type="text" name="subjectName" id="subjectName" value="{{$enrolmentSubject->subjectName}}" >
                    </div>

                    <div id="content-item">
                        <label for="subjectCode" class="">Subject Code: </label><br>
                        <input type="text" name="subjectCode" id="subjectCode" value="{{$enrolmentSubject->subjectCode}}" >
                    </div>

                    <div id="content-item">
                        <label for="lecturerId" class="">Lecturer Id: </label><br>
                        <input type="text" name="lecturerId" id="lecturerId" value="{{$enrolmentSubject->lecturerId}}" >
                    </div>

                    <div id="content-item">
                        <label for="lecturerEmail" class="">Lecturer Email: </label><br>
                        <input type="text" name="lecturerEmail" id="lecturerEmail" value="{{$enrolmentSubject->lecturerEmail}}" >
                    </div>

                    <div id="content-item">
                        <label for="faculty" class="">Faculty: </label><br>
                        <input type="text" name="faculty" id="faculty" value="{{$enrolmentSubject->faculty}}" >
                    </div>

                    <div id="content-item">
                        <label for="availableNo" class="">Available Student No: </label><br>
                        <input type="text" name="availableNo" id="availableNo" value="{{$enrolmentSubject->availableNo}}" >
                    </div>

    <div class="text-center">
                <input type="submit" name="insert"  id="button" class="" value="Comfirm" style="height: 50px; width: 30%;" >
    </div>
@endforeach
    </div>
</div>
@endsection