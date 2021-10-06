@extends('layouts.studentnav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div id="form" class="col-md-10">
        <form class="subform"  method="post" action="{{ route('storeInternForm') }}" enctype="multipart/form-data">
            @csrf   
            
            <div id="content">
                <p style="text-align:center;">Intern Form</p>

                <div class="form-group input-group-lg">
                <label for="studentName" class="text-dark">Student Name:</label><br>
                <input type="text" name="studentName" id="studentName" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                    <label for="faculty" class="text-dark">Faculty: </label><br>
                        <select id="faculty" name="faculty">
                            <option value=""></option>
                            <option id="faculty" name="faculty" value="Faculty of Business & Management">Faculty of Business & Management</option>
                            <option id="faculty" name="faculty" value="Faculty of Engineering & Information Technology">Faculty of Engineering & Information Technology</option>
                            <option id="faculty" name="faculty" value="Faculty of Humanities & Social Sciences">Faculty of Humanities & Social Sciences</option>
                            <option id="faculty" name="faculty" value="Faculty of Arts & Design">Faculty of Arts & Design</option>
                            <option id="faculty" name="faculty" value="Faculty of Chinese Medicine">Faculty of Chinese Medicine</option>
                            <option id="faculty" name="faculty" value="Faculty of Education & Psychology">Faculty of Education & Psychology</option>
                        </select>
                </div>

                <div class="form-group input-group-lg">
                <label for="program" class="text-dark">Program:</label><br>
                <input type="text" name="program" id="program" class="form-control">
                </div>

                <div class="form-group input-group-lg">
                <label for="address" class="text-dark">Address:</label><br>
                <textarea name="address" id="address" cols="50" rows="5"></textarea>
                </div>

               
                <div class="form-group input-group-lg">
                <label for="contact" class="text-info">Contact:</label><br>
                <input type="tel" id="contact" name="contact" placeholder="xxx-xxxxxxx" pattern="[0-9]{2-3}-[0-9]{7-8}" required><br><br>

                </div>


                <div class="form-group input-group-lg">
                    <label for="companyName" class="text-dark">Company Name: </label><br>
                    <input type="text" class="form-control" id="companyName" name="companyName">
                </div>

                <div class="form-group input-group-lg">
                <label for="companyAddress" class="text-dark">Company Address:</label><br>
                <textarea name="companyAddress" id="companyAddress" cols="50" rows="5"></textarea>
                </div>

                <div class="form-group input-group-lg">
                    <label for="jobType" class="text-dark">Job Type: </label><br>
                    <input type="text" class="form-control" id="jobType" name="jobType">
                </div>

                <div class="form-group input-group-lg">
                    <label for="jobName" class="text-dark">Job Name: </label><br>
                    <input type="text" class="form-control" id="jobName" name="jobName">
                </div>

                <div class="form-group input-group-lg">
                    <label for="position" class="text-dark">Position: </label><br>
                    <input type="text" class="form-control" id="position" name="position">
                </div>

                <div class="form-group input-group-lg">
                    <label for="salary" class="text-dark">Salary: </label><br>
                    <input type="number" class="form-control" id="salary" name="salary">
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