@extends('layouts.companyNav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div id="form" class="col-md-10">
        <form class="subform"  method="post" action="{{ route('update.EnrolmentSubjectList') }}" enctype="multipart/form-data">
            @csrf  
            
            <div id="content">
                <p style="text-align:center;">Edit Profile</p>

                @foreach($profile as $profile)

                <div class="form-group input-group-lg" style="display:none;">
                <label for="id" class="">No: </label><br>
                        <input type="text" name="id" id="id" value="{{$profile->id}}" readonly>
                </div>

                <div class="form-group input-group-lg">
                <div id="content-item">
                <label for="companyId" class="">Company Id: </label><br>
                        <input type="text" name="companyId" id="companyId" value="{{$profile->companyId}}" readonly>
                    </div>
                </div>

                <div class="form-group input-group-lg">
                <div id="content-item">
                <label for="name" class="">Company Name: </label><br>
                        <input type="text" name="name" id="name" value="{{$profile->name}}">
                    </div>
                </div>

                <div class="form-group input-group-lg">
                <label for="founder" class="">Founder: </label><br>
                        <input type="text" name="founder" id="founder" value="{{$profile->founder}}">
                </div>

                <div class="form-group input-group-lg">
                <label for="establish" class="">Establish Year: </label><br>
                        <input type="text" name="establish" id="establish" value="{{$profile->establish}}">
                </div>

                <div class="form-group input-group-lg">
                <label for="type" class="">Company Type: </label><br>
                        <input type="text" name="type" id="type"value="{{$profile->type}}" >
                </div>

                <div class="form-group input-group-lg">
                <label for="address" class="">Address: </label><br>
                        <input type="text" name="address" id="address"value="{{$profile->address}}" >
                </div>

                <div class="form-group input-group-lg">
                <label for="contact" class="">Contact: </label><br>
                        <input type="text" name="contact" id="contact"value="{{$profile->contact}}" >
                </div>

                <div class="form-group input-group-lg">
                <label for="ssm" class="">SSM: </label><br>
                        <input type="text" name="ssm" id="ssm"value="{{$profile->ssm}}" >
                </div>

                <div class="form-group input-group-lg">
                <label for="URL" class="">URL: </label><br>
                        <input type="text" name="URL" id="URL"value="{{$profile->URL}}" >
                </div>

                <div class="form-group input-group-lg">
                <label for="image" class="text-info">Photo: </label><br>
                    <input type="file" class="form-control" name="image" >
                    </div>
                </div>
             

                <div class="text-center">
                    <input type="submit" name="insert"  id="button" class="" value="Comfirm" style="height: 50px; width: 30%;" >
                </div>
            </form>
            @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
