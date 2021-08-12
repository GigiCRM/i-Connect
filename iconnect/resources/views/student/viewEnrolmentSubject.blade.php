@extends('layouts.adminNav')
@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')

<div>
    <div class="row">
        <div class="col-md-4">
            @foreach($enrolmentSubject as $enrolmentSubject)
                <div>Creator id: <br>{{$enrolmentSubject->creatorId}}</div>
                <div>Subject Name: <br>{{$enrolmentSubject->subjectName}}</div>
                <div>Subject Code: <br>{{$enrolmentSubject->subjectCode}}</div>
                <div>Lecturer Id: <br>{{$enrolmentSubject->lecturerId}}</div>
                <div>Lecturer Email: <br>{{$enrolmentSubject->lecturerEmail}}</div>
                <div>Faculty: <br>{{$enrolmentSubject->faculty}}</div>
                <div>Available student: <br>{{$enrolmentSubject->availableNo}}</div>

            @endforeach
        </div>
    </div>
    
</div>
@endsection