@extends('layouts.companyNav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

@section('content')

@foreach($profile as $profile)
<!-- Page Content -->
<div class="profile-content" >

<div class="page-content">
    <div class="w3-container w3-light-grey" id="info-background">
    <a href="{{route('editCompanyProfile', ['id' => $profile->id])}}" class="btn btn-warning" id="button"><i class="fas fa-edit">Edit</i></a>

   
<div id="center">
    <div class="info">
        <h3 style="background-color:carol;" >Company Profile</h3> 
        <div><img src="{{ asset('img/') }}/{{$profile->image}}"  alt=""></div>
        <div><em> No:</em> {{$profile->id}}</div>
        <div><em> Company Id:</em> {{$profile->companyId}}</div>
        <div><em> Name:</em> {{$profile->name}}</div>
        <div><em>Company Type:</em>  {{$profile->type}}</div>
        <div><em> Address:</em> {{$profile->address}}</div>
        <div><em> Contact No:</em> {{$profile->contact}}</div>
        <div><em> SSM:</em> {{$profile->ssm}}</div>

       
    </div>
</div>
    @endforeach
    </div>
</div>
@endsection