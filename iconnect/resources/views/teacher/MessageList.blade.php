@extends('layouts.teacherNav')
@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')

<div class="container">
	    <div class="row">
		    <table class="table table-hover table-striped">
		        <thead>
		        <tr class="thead-dark">
                    <th>No</th>
		            <th>Send to </th>
                    <th>Sender Id</th>
                    <th>Content</th>
                    <th>Action</th>


		        </tr>
		    </thead>
		        <tbody>	
                @foreach($message as $message)
		            <tr>
		                <td>{{$message->id}}</td>
                        <td>{{$message->receiverId}}</td>
                        <td>{{$message->senderId}}</td>
                        <td>{{$message->content}}</td>
                        <td><a href="{{route('createMessage', ['id' => $message->id])}}" class="btn btn-warning">Create Message</a></td>

		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>

	</div>
    </div>

@endsection