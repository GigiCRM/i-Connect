@extends('layouts.teacherNav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div id="form" class="col-md-10">
        <form class="subform"  method="post" action="{{ route('teacher.storeProfile') }}" enctype="multipart/form-data">
            @csrf   
            
            <div id="content">
                <p style="text-align:center;">Teacher Info</p>

                <div class="form-group input-group-lg">
                <label for="name" class="text-info">Name: </label><br>
                <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="faculty" class="text-info">Faculty:</label><br>
                <input type="text" name="faculty" id="faculty" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                    <label for="image" class="text-info">Photo: </label><br>
                    <input type="file" class="form-control" name="image" >
                </div>

                <div class="text-center">
                    <input type="submit" name="insert"  id="button" class="" value="Comfirm" style="height: 50px; width: 30%;" >
                </div>

            </form>
            </div>
        </div>
    </div>
</div>
@endsection