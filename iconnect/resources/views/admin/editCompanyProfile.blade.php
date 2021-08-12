@extends('layouts.adminNav')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/studentFormEdit.css') }}">
@section('content')

<div id="body">
                <div id="content" style="text-align:center"> 
                    <form class="subform"  method="post" action="{{ route('admin.updateCompanyProfile') }}" enctype="multipart/form-data">
                    @csrf <!-- very imdivortant if you didn't insert CSRF, it not allow submit the data-->

                    <div id="content-item">
                        <div style="font-weight:bold; font-size:25px; font-family: 'Libre Baskerville', serif;">Edit profile</div>
                    </div>
                    @foreach($profile as $profile)

                    <div id="content-item">
                        <label for="id" class="">No: </label><br>
                        <input type="text" name="id" id="id" value="{{$profile->id}}" readonly>
                    </div>
                    <div id="content-item">
                        <label for="companyId" class="">Company Id: </label><br>
                        <input type="text" name="companyId" id="companyId" value="{{$profile->companyId}}" readonly>
                    </div>
                   
                    <div id="content-item">
                        <label for="name" class="">Company Name: </label><br>
                        <input type="text" name="name" id="name" value="{{$profile->name}}">
                    </div>
                   
                    <div id="content-item">
                        <label for="type" class="">Company Type: </label><br>
                        <input type="text" name="type" id="type"value="{{$profile->type}}" >
                    </div>
                    <div id="content-item"> 
                        <label for="address" class="">Address: </label><br>
                        <input type="text" name="address" id="address"value="{{$profile->address}}" >
                    </div>
                    <div id="content-item">
                        <label for="contact" class="">Contact: </label><br>
                        <input type="text" name="contact" id="contact"value="{{$profile->contact}}" >
                    </div>
                   
                    <div id="content-item">
                        <label for="ssm" class="">SSM: </label><br>
                        <input type="text" name="ssm" id="ssm"value="{{$profile->ssm}}" >
                    </div>

                    <div class="form-group input-group-lg">
                    <label for="image" class="text-info">Photo: </label><br>
                    <input type="file" class="form-control" name="image" >
                    </div>

                    @endforeach
                    <p>
                        <input id="button" type="submit" name="insert" value="Insert">
                    </p>
                    </form>
                </div>
            </div>
@endsection
