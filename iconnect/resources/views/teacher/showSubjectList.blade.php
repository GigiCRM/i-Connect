@extends('layouts.teacherNav')
<link rel="stylesheet" href="{{ asset('css/subjectList.css') }}">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Besley&display=swap" rel="stylesheet">

@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')

<div class="container">
            <form action="{{ route('teacher.searchSubjectList') }}" method="post"  id="search" style="margin-bottom:15px;" >
                @csrf
                <input type="text" name="searchJob" id="searchJob" style="height:30px; width:200px;">
                <button class="btn btn-info" type="submit"  style="height:30px; width:70px; font-size:14px; margin-left:10px;">Search</button>
            </form>
    <div class="row">
    @foreach($subjectLists as $subjectList)
        <div class="col-md-4" id="card-body">

                <div id="idNo">No:{{$subjectList->id}}</div>
                <div class="title" style="text-decoration:underline; font-weigth:bold;">{{$subjectList->subjectName}}</div>
                <div>Subject Code:{{$subjectList->subjectCode}}</div>
                <div>Faculty: {{$subjectList->faculty}}</div>
                <div>Available student no: {{$subjectList->availableNo}}</div>

                <a href="{{route('teacher.showStudentList', ['id' => $subjectList->id])}}" ><button id="button" class="btn btn-info" >Student List </button> </a>
                <a href="{{route('teacher.addClassroom', ['id' => $subjectList->id])}}" ><button id="button"  class="btn btn-info">Classroom</button> </a>

            
        </div>
        @endforeach
    </div>
    <div class="pagination">
                {!! $subjectLists->links() !!}
            </div>
    </div>

@endsection