@extends('layouts.alumniNav')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/studentProfileForm.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div id="form" class="col-md-10">
        <form class="subform"  method="post" action="{{ route('alumni.addStudentProfile') }}" enctype="multipart/form-data">
            @csrf   
            
            <div id="content">
                <p style="text-align:center;">Student Info</p>

                <div class="form-group input-group-lg">
                <label for="name" class="text-info">Name:</label><br>
                <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group input-group-lg">
                <label for="gender" class="text-info">Gender:</label><br>
                <input type="radio" id="gender" name="gender" value="female">
                    <label for="html">Female</label><br>
                <input type="radio" id="gender" name="gender" value="male">
                    <label for="css">Male</label><br>
                </div>

                <div class="form-group input-group-lg">
                <label for="studentId" class="text-info">Student ID:</label><br>
                <input type="text" name="studentId" id="studentId" class="form-control"required>
                </div>

                <div class="form-group input-group-lg">
                <label for="batchNo" class="text-info">Batch No:</label><br>
                <input type="text" name="batchNo" id="batchNo" class="form-control"required>
                </div>

                <div class="form-group input-group-lg">
                <label for="email" class="text-info">Email:</label><br>
                <input type="text" name="email" id="email" class="form-control"required>
                </div>

                <div class="form-group input-group-lg">
                <label for="contact" class="text-info">Contact:</label><br>
                <input type="tel" id="contact" name="contact" placeholder="xxx-xxxxxxx" pattern="[0-9]{2-3}-[0-9]{7-8}" required><br><br>

                </div>

                <div class="form-group input-group-lg">
                    <label for="profileImage" class="text-info">Photo: </label><br>
                    <input type="file" class="form-control" name="profile-image" required>
                </div>

                <p style="text-align:center;"> Educational Background</p>

                <div class="form-group input-group-lg">
                    <label for="university" class="text-info">University: </label><br>
                    <input type="text" class="form-control" id="university" name="university"required>
                </div>

                <div class="form-group input-group-lg">
                    <label for="fOStudy" class="text-info">Faculty: </label><br>
                        <select id="fOStudy" name="fOStudy">
                            <option value=""></option>
                            <option id="fOStudy" name="fOStudy" value="Faculty of Business & Management">Faculty of Business & Management</option>
                            <option id="fOStudy" name="fOStudy" value="Faculty of Engineering & Information Technology">Faculty of Engineering & Information Technology</option>
                            <option id="fOStudy" name="fOStudy" value="Faculty of Humanities & Social Sciences">Faculty of Humanities & Social Sciences</option>
                            <option id="fOStudy" name="fOStudy" value="Faculty of Arts & Design">Faculty of Arts & Design</option>
                            <option id="fOStudy" name="fOStudy" value="Faculty of Chinese Medicine">Faculty of Chinese Medicine</option>
                            <option id="fOStudy" name="fOStudy" value="Faculty of Education & Psychology">Faculty of Education & Psychology</option>
                        </select>
                </div>

                <div class="form-group input-group-lg">
                    <label for="program" class="text-info">Program: </label><br>
                    <input type="radio" id="program" name="program" value="diploma">
                    <label for="diploma">Diploma</label><br>
                <input type="radio" id="program" name="program" value="degree">
                    <label for="degree">Degree</label><br>
                </div>

                <div class="form-group input-group-lg">
                    <label for="gpa" class="text-info">GPA: </label><br>
                    <input type="text" class="form-control" id="gpa" name="gpa"required>
                </div>

                <div class="form-group input-group-lg">
                    <label for="yearGraduate" class="text-info">Year Graduate: </label><br>
                    <input type="number" class="form-control" id="yearGraduate" name="yearGraduate" >
                </div>

                <div class="form-group input-group-lg">
                    <label for="resultImage" class="text-info">Result: </label><br>
                    <input type="file" class="form-control" name="result-image"required >
                </div>

                <div class="form-group input-group-lg">
                    <label for="image" class="text-info">Relevant Project: </label><br>
                    <input type="file" class="form-control" name="project-image"required>
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