
@extends('layouts.adminNav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div id="form" class="col-md-10">
        <form class="subform"  method="post" action="{{ route('update.EnrolmentSubjectList') }}" enctype="multipart/form-data">
            @csrf  
            
            <div id="content">
                <p style="text-align:center;">Edit Enrolment Subject</p>

                @foreach($enrolmentSubject as $enrolmentSubject)

                <div class="form-group input-group-lg" style="display:none;">
                <label for="id" class="">Id: </label><br>
                        <input type="text" name="id" id="id" value="{{$enrolmentSubject->id}}" readonly>
                </div>

                <div class="form-group input-group-lg">
                <div id="content-item">
                        <label for="subjectName" class="">Subject Name: </label><br>
                        <input type="text" name="subjectName" id="subjectName" value="{{$enrolmentSubject->subjectName}}" >
                    </div>
                </div>

                <div class="form-group input-group-lg">
                <div id="content-item">
                        <label for="subjectCode" class="">Subject Code: </label><br>
                        <input type="text" name="subjectCode" id="subjectCode" value="{{$enrolmentSubject->subjectCode}}" >
                    </div>
                </div>

                <div class="form-group input-group-lg">
                <label for="lecturerId" class="">Lecturer Id: </label><br>
                        <input type="text" name="lecturerId" id="lecturerId" value="{{$enrolmentSubject->lecturerId}}" >
                </div>

                <div class="form-group input-group-lg">
                <label for="lecturerEmail" class="">Lecturer Email: </label><br>
                        <input type="text" name="lecturerEmail" id="lecturerEmail" value="{{$enrolmentSubject->lecturerEmail}}" >
                </div>

                <div class="form-group input-group-lg">
                <label for="faculty" class="">Faculty: </label><br>
                        <input type="text" name="faculty" id="faculty" value="{{$enrolmentSubject->faculty}}" >
                </div>

                <div class="form-group input-group-lg">
                <label for="availableNo" class="">Available Student No: </label><br>
                        <input type="text" name="availableNo" id="availableNo" value="{{$enrolmentSubject->availableNo}}" >
                </div>

                <div class="text-center">
                    <input type="submit" name="insert"  id="button" class="" value="Comfirm" style="height: 50px; width: 30%;" >
                </div>

            </form>
            @endforeach

            </div>
        </div>
    </div>
</div>
@endsection