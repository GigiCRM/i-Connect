@extends('layouts.studentnav')
<link rel="stylesheet" href="{{ asset('css/studentViewEnrolmentSubject.css') }}">
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

<div class="row">

            </div>
<div class="container" >


    <div class="row" >
    @foreach($posts as $posts)
        <div class="column" id="card-body" style="padding:20px; width:800px;">
       

                <div style="display:none;">Subject Name:{{$posts->subjectName}}</div>
                <div style="display:none;">Subject Code:{{$posts->subjectCode}}</div>
                <div style="display:none;">Publisher Id:{{$posts->publisherId}}</div>
                <div>Title: {{$posts->title}}</div>
                <div>{{$posts->comment}}</div>
                <div>{{$posts->content}}</div>
                <div>  <img src="{{ asset('img/') }}/{{$posts->image}}" alt="" style="width:300; height:200;"></div>
                <div style="float:right;">{{$posts->updated_at}}</div>
                <div style="float:right; padding-right:20px;">Posted by: {{$posts->publisherName}}</div>
               

            

            
        </div>

        @endforeach    </div>
    </div>

@endsection