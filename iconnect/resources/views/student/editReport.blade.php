@extends('layouts.studentnav')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/studentFormEdit.css') }}">
@section('content')

<div id="body">
                <div id="content" style="text-align:center"> 
                    <form class="subform"  method="post" action="{{ route('student.updateReport') }}" enctype="multipart/form-data">
                    @csrf <!-- very imdivortant if you didn't insert CSRF, it not allow submit the data-->

                    <div id="content-item">
                        <div style="font-weight:bold; font-size:25px; font-family: 'Libre Baskerville', serif;">Edit Weekly Log</div>
                    </div>
                    @foreach($reports as $reports)

                    <div id="content-item">
                        <label for="id" class="">Id: </label><br>
                        <input type="number" name="id" id="id" value="{{$reports->id}}" readonly>
                    </div>

                    <div id="content-item">
                        <label for="week" class="">Week: </label><br>
                        <input type="number" name="week" id="week" value="{{$reports->week}}" readonly>
                    </div>
                    <div id="content-item">
                        <label for="content" class="">Content: </label><br>
                        <textarea name="content" id="content" cols="80" rows="30" value="{{$reports->content}}"></textarea>
                    </div>
             
                    @endforeach
                    <p>
                        <input id="button" type="submit" name="insert" value="Insert">
                    </p>
                    </form>
                </div>
            </div>
@endsection
