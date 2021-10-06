
@extends('layouts.studentnav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/studentShowEnrolSubject.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

@section('content')


<!-- Page Content -->
<div class="profile-content" >

    <div class="page-content">
        <div class="w3-container w3-light-grey" id="info-background">
    
                <div id="center">
                    <div class="">
                        <div class="underline-title">Messages</div>
                        @foreach($message as $message)
 
                    <div class="row">

                            <div class="col-md-6" id="card-body">
                                
                                    <div>No: {{$message->id}}</div>
                                    <div>Sender ID:{{$message->senderId}}</div>
                                    <div>{{$message->content}}</div>
                                    <div>{{$message->updated_at}}</div>

                            </div>

                        
                    </div>
                    @endforeach
        </div>
    </div>
   
    </div>
</div>
@endsection