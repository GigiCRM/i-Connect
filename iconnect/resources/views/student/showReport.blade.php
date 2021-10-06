@extends('layouts.studentnav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
@foreach($reports as $reports)
<div class="body" id="report-body">
   <div class="row"  id="report-content">
       <div id="float-right">
   <a href="{{route('student.editReport', ['id' => $reports->id])}}" class="btn btn-info" id="report-edit-btn">Edit</a></div>
       <div class="report-content-box">
   
    <div style="background-color:carol;"id="report-week">Week: {{$reports->week}}</div> 
    <div style="line-height:220%;"><em>{{$reports->content}}</em> </div>
    </div>
    </div>  
</div>
    @endforeach
@endsection

