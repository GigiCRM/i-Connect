@extends('layouts.adminNav')
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
                    <th>No</th>
                    <th>Company Id</th>
		            <th>Name</th>
                    <th>Company Type</th>
                    <th>Address</th>
		            <th>Contact</th>
		            <th>SSM</th>
                    <th>Action</th>


		        </tr>
		    </thead>
		        <tbody>	
                @foreach($company as $company)
		            <tr>
                        
                    <td><img src="{{ asset('img/') }}/{{$company->image}}" alt="" width="50"></td>
                        <td>{{$company->id}}</td>
                        <td>{{$company->companyId}}</td>
                        <td>{{$company->name}}</td>
                        <td>{{$company->type}}</td>
                        <td>{{$company->address}}</td>
                        <td>{{$company->contact}}</td>
                        <td>{{$company->ssm}}</td>
                        <td><a href="{{route('admin.editCompanyProfile', ['id' => $company->id])}}" class="btn btn-warning" id="button">Edit</a>
                            <a href="{{route('admin.deleteCompanyProfile', ['id' => $company->id])}}" class="btn btn-danger" onclick="return confirm('Sure Want Delete?')">Delete</a>

                        
                        </td>

		            </tr> 
                @endforeach

				
		        </tbody>
		    </table>

	</div>
    </div>

@endsection