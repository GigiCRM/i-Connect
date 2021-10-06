@extends('layouts.teacherNav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/showClassroom.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

@section('content')


<div class="profile-content" >

<div class="page-content">
    <div class="w3-container w3-white" id="info-background" style="height:100%; ">
    @foreach($classroom as $classroom)
<!-- Page Content -->   
<div id="center" >
    <div class="info">
        <h3 style="" >Classroom for {{$classroom->subjectName}} {{$classroom->subjectCode}}</h3> 
    
        <a href="{{route('teacher.insertPost', ['id' => $classroom->id])}}" ><button id="button"class="btn btn-info" >Posting</button> </a>
        <a href="{{route('teacher.showPost', ['subjectId' => $classroom->subjectId])}}" ><button id="button"class="btn btn-info" >View Post</button> </a>


    </div>
</div>
    @endforeach
    </div>
</div>
@endsection