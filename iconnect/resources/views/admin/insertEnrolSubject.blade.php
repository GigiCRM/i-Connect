@extends('layouts.adminNav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div id="form" class="col-md-10">
        <form class="subform"  method="post" action="{{ route('addEnrolSubject') }}" enctype="multipart/form-data">
            @csrf   
            
            <div id="content">
                <p style="text-align:center;">Insert Enrolment Subject</p>

                <div class="form-group input-group-lg">
                <label for="subjectName" class="text-info">Subject Name:</label><br>
                <input type="text" name="subjectName" id="subjectName" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="subjectCode" class="text-info">Subject Code:</label><br>
                <input type="text" name="subjectCode" id="subjectCode" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="lecturerId" class="text-info">Lecturer id: </label><br>
                <input type="text" name="lecturerId" id="lecturerId" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="lecturerEmail" class="text-info">Lecturer Email:</label><br>
                <input type="text" name="lecturerEmail" id="lecturerEmail" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="faculty" class="text-info">Faculty: </label><br>
                <input type="text" name="faculty" id="faculty" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="availableNo" class="text-info">Available Student No: </label><br>
                <input type="number" name="availableNo" id="availableNo" class="form-control">
                </div>

                <div class="text-center">
                    <input type="submit" name="insert"  id="button" class="" value="Comfirm" style="height: 50px; width: 30%;" >
                </div>

            </form>
            </div>
        </div>
    </div>
</div>
@endsection