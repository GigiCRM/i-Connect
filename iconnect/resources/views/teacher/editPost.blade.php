@extends('layouts.teacherNav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div id="form" class="col-md-10">
        <form class="subform"  method="post" action="{{ route('teacher.updatePost') }}" enctype="multipart/form-data">
            @csrf   
            
            <div id="content">
                <p style="text-align:center;">Post something...</p>
                @foreach($posts as $posts)
                <div class="form-group input-group-lg" style="display:none;">
                <label for="id" class="text-dark">id: </label><br>
                <input type="text" name="id" id="id" class="form-control" value="{{$posts->id}}">
                </div>
               
                <div class="form-group input-group-lg">
                <label for="title" class="text-dark">Title: </label><br>
                <input type="text" name="title" id="title" class="form-control" value="{{$posts->title}}">
                </div>

                <div class="form-group input-group-lg">
                <label for="comment" class="text-dark">Comment:</label><br>
                <input type="text" name="comment" id="comment" class="form-control" value="{{$posts->comment}}">
                </div>

                <div class="form-group input-group-lg">
                <label for="content" class="text-dark">Content:</label><br>
                <input type="text" name="content" id="content" class="form-control" value="{{$posts->content}}"> 
                </div>


                <div class="form-group input-group-lg">
                    <label for="image" class="text-dark">Image: </label><br>
                    <input type="file" class="form-control" name="image" >
                </div>

                <div class="text-center">
                    <input type="submit" name="insert"  id="button" class="btn btn-info" value="Comfirm" style="height: 50px; width: 30%;" >
                </div>
                @endforeach
            </form>
            </div>
        </div>
    </div>
</div>
@endsection