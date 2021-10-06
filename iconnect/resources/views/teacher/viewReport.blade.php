@extends('layouts.teacherNav')
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
        <div class="column" id="card-body" style="padding:20px;">

                <div class="title" style="text-decoration:underline; font-weigth:bold;">Week {{$posts->week}}</div>
                <div>{{$posts->content}}</div>
            

            
        </div>
        @endforeach
    </div>
    </div>

@endsection