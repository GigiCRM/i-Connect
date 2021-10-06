@extends('layouts.adminNav')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">

@section('content')


<div class="container" style="font-family: Arial, Helvetica, sans-serif; padding-top:20px; 
">

<div class="row" id="row-adjust" style="float:right; display:block; padding-bottom:10px;" >
            <form action="{{ route('admin.searchStudent') }}" method="post"  id="search">
                @csrf
                <input type="text" name="searchJob" id="searchJob" style="height:30px; width:200px;">
                <button class="btn btn-info" type="submit" id="button" style="height:30px; width:70px; font-size:14px;">Search</button>
            </form>
</div>

	    <div class="row" style=" display:block;" >
            <table  class="table table-hover table-striped" style="font-size:15px;">
                <tr class="thead-dark" >
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Student ID</th>
                    <th>Program</th>
                    <th>Batch No.</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
                @foreach($student as $students)

                <tr>
                    <td><a href="{{route('showStudent.Profile', ['id' => $students->id])}}">{{$students->Name}}</a> </td>
                    <td>{{$students->Gender}}</td>
                    <td><a href="{{route('showStudent.Profile', ['id' => $students->id])}}">{{$students->StudentID}}</a></td>
                    <td>{{$students->Program}}</td>
                    <td>{{$students->Batch_No}}</td>
                    <td>{{$students->Email}}</td>
                    <td>{{$students->Contact}}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="pagination">
                {!! $student->links() !!}
            </div>
</div>
@endsection