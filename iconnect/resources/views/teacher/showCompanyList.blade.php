@extends('layouts.teacherNav')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="{{ asset('css/showCompanyList.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1:wght@500&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

@if(Session::has('success'))           
        <div class="alert alert-success" role="alert">
            {{ Session::get('success')}}
        </div>       
@endif 
@section('content')
<div class="row" id="row-adjust">
            <form action="{{ route('teacher.searchCompany') }}" method="post"  id="search">
                @csrf
                <input type="text" name="searchJob" id="searchJob" style="height:30px; width:200px;">
                <button class="btn btn-info" type="submit" id="button">Search</button>
            </form>
</div>
@foreach($companies as $company)

<div class="row" id="row-adjust">

<div class="body">
            
        <div class="column" id="border">
            <div class="row">
                    <div class="column" id="details-side">
                        <div class="none">{{$company->companyId}}</div>
                        <div id="title">{{$company->name}}</div>
                        <div>{{$company->type}}</div>
                        <div>Address: {{$company->address}}</div>
                        <div>Contact: {{$company->contact}}</div>
                        <div>SSM No. {{$company->ssm}}</div>

                    </div>

                    <div class="column" id="img-side">
                        <img src="{{ asset('img/') }}/{{$company->image}}" alt="" >
                    </div>
                
            </div>
        </div>
    
</div>
</div>

@endforeach


            <div class="pagination">
                {!! $companies->links() !!}
            </div>

@endsection