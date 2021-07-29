@extends('layouts.adminNav')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/studentFormEdit.css') }}">
@section('content')

<div id="body">
                <div id="content" style="text-align:center"> 
                    <form class="subform"  method="post" action="{{ route('job.approve') }}" enctype="multipart/form-data">
                    @csrf <!-- very imdivortant if you didn't insert CSRF, it not allow submit the data-->

                    <div id="content-item">
                        <div style="font-weight:bold; font-size:25px; font-family: 'Libre Baskerville', serif;">Approval</div>
                    </div>
                    @foreach($jobs as $jobs)

                    <div id="content-item">
                        <label for="status" class="">Status </label><br>
                        <input type="number" name="status" id="status" value="{{$jobs->status}}" >
                    </div>
                    

                    @endforeach
                    <p>
                        <input id="button" type="submit" name="insert" value="Insert">
                    </p>
                    </form>
                </div>
            </div>
@endsection
