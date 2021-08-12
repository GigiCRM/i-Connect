@extends('layouts.adminNav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">

@section('content')


<!-- Page Content -->
<div class="profile-content">

<div class="page-content">
    <div class="w3-container w3-light-grey" style="height: 100%;">
   
    <form class="subform"  method="post" action="{{ route('updateStudentInternStatus') }}" enctype="multipart/form-data">
            @csrf  


    @foreach($internStatus as $internStatus)
    
                    <div id="content-item">
                        <label for="id" class="">User id: </label><br>
                        <input type="text" name="id" id="id" value="{{$internStatus->id}}" readonly>
                    </div>

    <div>Please click the button below to start your intern process.</div>
    <div class="form-group input-group-lg">
                <label for="status" class="text-info">Status:</label><br>
                <input type="radio" id="status" name="status" value="Valid">
                    <label for="html">Comfirm</label><br>
                <input type="radio" id="status" name="status" value="Invalid">
                    <label for="html">Cancel</label><br>
                </div>
    <div class="text-center">
                <input type="submit" name="insert"  id="button" class="" value="Comfirm" style="height: 50px; width: 30%;" >
    </div>
@endforeach
    </div>
</div>
@endsection