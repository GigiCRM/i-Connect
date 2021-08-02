@extends('layouts.adminNav')

@section('content')
<div class="container">
	    <div class="row">
            <table  class="table table-hover table-striped">
                <tr class="thead-dark">
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Student ID</th>
                    <th>Program</th>
                    <th>Batch No.</th>
                    <th>Email</th>
                    <th>Contact</th>
                </tr>
                @foreach($students as $students)

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
</div>
@endsection