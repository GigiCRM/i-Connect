@extends('layouts.studentnav')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/studentFormEdit.css') }}">
@section('content')

<div id="body">
                <div id="content" style="text-align:center"> 
                    <form class="subform"  method="post" action="{{ route('updateStudentProfile') }}" enctype="multipart/form-data">
                    @csrf <!-- very imdivortant if you didn't insert CSRF, it not allow submit the data-->

                    <div id="content-item">
                        <div style="font-weight:bold; font-size:25px; font-family: 'Libre Baskerville', serif;">Edit profile</div>
                    </div>
                    @foreach($students as $students)

                    <div id="content-item">
                        <label for="id" class="">User id: </label><br>
                        <input type="text" name="id" id="id" value="{{$students->id}}" readonly>
                    </div>
                    <div id="content-item">
                        <label for="name" class="">Name: </label><br>
                        <input type="text" name="name" id="name" value="{{$students->Name}}">
                    </div>
                   
                    <div id="content-item">
                        <label for="studentId" class="">Student ID: </label><br>
                        <input type="text" name="studentId" id="studentId" value="{{$students->StudentID}}">
                    </div>
                   
                    <div id="content-item">
                        <label for="email" class="">Email: </label><br>
                        <input type="text" name="email" id="email"value="{{$students->Email}}" readonly>
                    </div>
                    <div id="content-item"> 
                        <label for="contact" class="">Contact: </label><br>
                        <input type="text" name="contact" id="contact"value="{{$students->Contact}}" >
                    </div>
                    <div id="content-item">
                        <label for="university" class="">University: </label><br>
                        <input type="text" name="university" id="university"value="{{$students->University}}" >
                    </div>
                   
                    <div id="content-item">
                        <label for="gpa" class="">GPA: </label><br>
                        <input type="text" name="gpa" id="gpa"value="{{$students->GPA}}" >
                    </div>
                    <div id="content-item">
                        <label for="yearGraduate" class="">Year Graduate: </label><br>
                        <input type="text" name="yearGraduate" id="yearGraduate"value="{{$students->YearGraduate}}" >
                    </div>

                    @endforeach
                    <p>
                        <input id="button" type="submit" name="insert" value="Insert">
                    </p>
                    </form>
                </div>
            </div>
@endsection
