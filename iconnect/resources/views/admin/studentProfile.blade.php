@extends('layouts.adminNav')
<link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">


@section('content')

@foreach($students as $students)
<div class="profile-content" style="background-color:white;">

<div class="page-content">
    <div class="w3-container w3-light-blue" id="info-background">
   
   
<div id="center">
    <div class="info">
        <h3 style="background-color:skyblue;" >Personal Info</h3> 
        <div><img src="{{ asset('img/') }}/{{$students->Image}}"  alt=""></div>
        <div><em> Name:</em> {{$students->Name}}</div>
        <div><em> Gender:</em> {{$students->Gender}}</div>
        <div><em>Student ID:</em>  {{$students->StudentID}}</div>
        <div><em> Program:</em> {{$students->Program}}</div>
        <div><em> Batch No:</em> {{$students->Batch_No}}</div>
        <div><em> Email:</em> {{$students->Email}}</div>
        <div><em>Contact:</em>  {{$students->Contact}}</div>

        <h3 style="margin: top 25px;background-color:skyblue;">Educational Background</h3>
        <div><em> University:</em> {{$students->University}}</div>
        <div><em> Field of Study:</em> {{$students->FieldOfStudy}}</div>
        <div><em> Program:</em> {{$students->Program}}</div>
        <div><em> GPA:</em> {{$students->GPA}}</div>
        <div><em>Year Graduate:</em>  {{$students->YearGraduate}} </div>
        <div><em> Relevant Project:</em><br><img src="{{ asset('img/') }}/{{$students->RelevantProject}}"  alt=""></div>
        <div><em> Result:</em><br><img src="{{ asset('img/') }}/{{$students->Result}}"  alt=""></div>
    </div>
</div>
    @endforeach
    </div>
</div>
@endsection
