@extends('layouts.adminNav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div id="form" class="col-md-10">
        <form class="subform"  method="post" action="{{ route('addJob') }}" enctype="multipart/form-data">
            @csrf   
            
            <div id="content">
                <p style="text-align:center;">Job Posting</p>
                
                <div class="form-group input-group-lg">
                <label for="companyName" class="text-dark">Company Name:</label><br>
                <input type="text" name="companyName" id="companyName" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="jobName" class="text-dark">Job:</label><br>
                <input type="text" name="jobName" id="jobName" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="position" class="text-dark">Position</label><br>
                <input type="text" name="position" id="position" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="salary" class="text-dark">Salary:</label><br>
                <input type="number" name="salary" id="salary" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="qualification" class="text-dark">Requirements: </label><br>
                <input type="text" name="qualification" id="qualification" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="location" class="text-dark">Address:</label><br>
                        <textarea name="location" id="location" cols="50" rows="5"></textarea>
                </div>

                <div class="form-group input-group-lg">
                <label for="workingHour" class="text-dark">Working Hour: </label><br>
                <input type="text" name="workingHour" id="workingHour" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                    <label for="typeOfJob" class="text-dark">Full-time / Part-time: </label><br>
                    <input type="radio" id="typeOfJob" name="typeOfJob" value="Full-time">
                    <label for="Full-time">Full-time</label><br>
                <input type="radio" id="typeOfJob" name="typeOfJob" value="Part-time">
                    <label for="Part-time">Part-time</label><br>
                </div>

                <div class="form-group input-group-lg">
                <label for="description" class="text-dark">Description: </label><br>
                <input type="text" name="description" id="description" class="form-control">
                </div>

                
                <div class="form-group input-group-lg">
                    <label for="employeeType" class="text-dark">Employee Type: </label><br>
                    <input type="radio" id="employeeType" name="employeeType" value="Intern">
                    <label for="Intern">Intern</label><br>
                <input type="radio" id="employeeType" name="employeeType" value="Normal">
                    <label for="Normal">Normal</label><br>
                </div>

                <div class="form-group input-group-lg">
                    <label for="image" class="text-dark">Image: </label><br>
                    <input type="file" class="form-control" name="image" >
                </div>

                <div class="form-group input-group-lg">
                <label for="status" class="text-dark">Status:</label><br>
                <input type="number" name="status" id="status" class="form-control" readonly>
                </div>

                <div class="text-center">
                    <input type="submit" name="insert"  id="button" class="" value="Comfirm" style="height: 50px; width: 30%;" >
                </div>

            </form>
            </div>
        </div>
    </div>
</div>
@endsection