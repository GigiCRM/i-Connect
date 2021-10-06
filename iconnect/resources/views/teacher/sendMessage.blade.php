@extends('layouts.studentnav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div id="form" class="col-md-10">
        <form class="subform"  method="post" action="{{route('storeMessage')}}" enctype="multipart/form-data">
            @csrf   
            
            <div id="content">
                <p style="text-align:center;">Leave Messages...</p>
                @foreach($message as $message)
                <div class="form-group input-group-lg">
                <label for="id" class="text-info">Id:</label><br>
                <input type="text" name="id" id="id" class="form-control" value="{{$message->id}}" readonly >
                </div>

                <div class="form-group input-group-lg">
                <label for="receiverId" class="text-info">Receiver Id:</label><br>
                <input type="text" name="receiverId" id="receiverId" class="form-control" value="{{$message->receiverId}}" readonly>
                </div>

                <div class="form-group input-group-lg">
                <label for="senderId" class="text-info">Sender Id:</label><br>
                <input type="text" name="senderId" id="senderId" class="form-control" value="{{$message->senderId}}" readonly>
                </div>
               
                <div class="form-group input-group-lg">
                <label for="content" class="text-info">Content:</label><br>
                <textarea name="content" id="content" cols="50" rows="5"></textarea>
                </div>
                @endforeach
                <div class="text-center">
                    <input type="submit" name="insert"  id="button" class="" value="Send" style="height: 50px; width: 30%;" >
                </div>

            </form>
            </div>
        </div>
    </div>
</div>
@endsection