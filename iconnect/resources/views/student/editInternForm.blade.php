@extends('layouts.studentnav')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/studentFormEdit.css') }}">
@section('content')

<div id="body">
                <div id="content" style="text-align:center"> 
                    <form class="subform"  method="post" action="{{ route('student.updateInternForm') }}" enctype="multipart/form-data">
                    @csrf <!-- very imdivortant if you didn't insert CSRF, it not allow submit the data-->

                    <div id="content-item">
                        <div style="font-weight:bold; font-size:25px; font-family: 'Libre Baskerville', serif;">Edit Intern Form</div>
                    </div>
                    @foreach($internForm as $internForm)

                    <div id="content-item">
                        <label for="id" class="">No: </label><br>
                        <input type="number" name="id" id="id" value="{{$internForm->id}}" readonly>
                    </div>

                    <div id="content-item">
                        <label for="studentName" class="">Student Name: </label><br>
                        <input type="text" name="studentName" id="studentName" value="{{$internForm->studentName}}" >
                    </div>

                    <div id="content-item">
                        <label for="faculty" class="">Faculty: </label><br>
                        <input type="text" name="faculty" id="faculty" value="{{$internForm->faculty}}" >
                    </div>

                    <div id="content-item">
                        <label for="program" class="">Program: </label><br>
                        <input type="text" name="program" id="program" value="{{$internForm->program}}" >
                    </div>

                    <div id="content-item">
                        <label for="address" class="">Address: </label><br>
                       <textarea name="address" id="address" cols="20" rows="5" value="{{$internForm->address}}"></textarea>
                    </div>
                    
                    <div id="content-item">
                        <label for="contact" class="">Contact: </label><br>
                        <input type="number" name="contact" id="contact" value="{{$internForm->contact}}" >
                    </div> 
                    
                    <div id="content-item">
                        <label for="companyName" class="">Company Name: </label><br>
                        <input type="text" name="companyName" id="companyName" value="{{$internForm->companyName}}" >
                    </div>

                    <div id="content-item">
                        <label for="companyAddress" class="">Company Address: </label><br>
                        <textarea name="companyAddress" id="companyAddress" cols="20" rows="5" value="{{$internForm->companyAddress}}"></textarea>
                    </div>

                    <div id="content-item">
                        <label for="jobType" class="">Job Type: </label><br>
                        <input type="text" name="jobType" id="jobType" value="{{$internForm->jobType}}" >
                    </div>

                    <div id="content-item">
                        <label for="jobName" class="">Job Name: </label><br>
                        <input type="text" name="jobName" id="jobName" value="{{$internForm->jobName}}" >
                    </div>

                    <div id="content-item">
                        <label for="position" class="">Position: </label><br>
                        <input type="text" name="position" id="position" value="{{$internForm->position}}" >
                    </div>

                    <div id="content-item">
                        <label for="salary" class="">Salary: </label><br>
                        <input type="text" name="salary" id="salary" value="{{$internForm->salary}}" >
                    </div>
             
                    @endforeach
                    <p>
                        <input id="button" type="submit" name="insert" value="Insert">
                    </p>
                    </form>
                </div>
            </div>
@endsection
