@extends('layouts.companyNav')
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
		            <th>Image</th>
                    <th>Company Id</th>
		            <th>Name</th>
                    <th>Company Type</th>
                    <th>Address</th>
		            <th>Contact</th>
		            <th>SSM</th>
                   


		        </tr>
		    </thead>
		        <tbody>	
                @foreach($company as $company)
		            <tr>
                        
                    <td><img src="{{ asset('img/') }}/{{$company->image}}" alt="" width="50"></td>
                        <td>{{$company->companyId}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->type}}</td>
                        <td>{{$company->address}}</td>
                        <td>{{$company->contact}}</td>
                        <td>{{$company->ssm}}</td>
                        

		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>

	</div>
    </div>

@endsection