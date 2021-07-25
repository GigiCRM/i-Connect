<div>
    <form class="subform" method="post" action="{{ route('updateStudentProfile') }}" enctype="multipart/form-data">
        @csrf

        <h3>Personal Info</h3> 

        @foreach ($students as $students)
   
            <div class="form-group input-group-lg">
            <label for="name" class="text-info">Name:</label><br>
            <input type="text" name="name" id="name" class="form-control" value="{{$students->name}}">
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
            <input type="text" name="studentId" id="studentId" class="form-control"value="{{$students->StudentID}}">
            </div>

            <div class="form-group input-group-lg">
            <label for="batchNo" class="text-info">Batch No:</label><br>
            <input type="text" name="batchNo" id="batchNo" class="form-control" value="{{$students->Batch_No}}">
            </div>

            <div class="form-group input-group-lg">
            <label for="email" class="text-info">Email:</label><br>
            <input type="text" name="email" id="email" class="form-control" value="{{$students->Email}}" readonly>
            </div>

            <div class="form-group input-group-lg">
            <label for="contact" class="text-info">Contact:</label><br>
            <input type="number" name="contact" id="contact" class="form-control" value="{{$students->Contact}}">
            </div>


            <p>Educational Background</p>

            <div class="form-group input-group-lg">
                <label for="university" class="text-info">University: </label><br>
                <input type="text" class="form-control" id="university" name="university"value="{{$students->University}}">
            </div>

            <div class="form-group input-group-lg">
                <label for="fOStudy" class="text-info">Field of Study: </label><br>
                <input type="text" class="form-control" id="fOStudy" name="fOStudy" value="{{$students->FieldOfStudy}}">
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
                <input type="text" class="form-control" id="gpa" name="gpa"value="{{$students->GPA}}">
            </div>

            <div class="form-group input-group-lg">
                <label for="yearGraduate" class="text-info">Year Graduate: </label><br>
                <input type="number" class="form-control" id="yearGraduate" name="yearGraduate" value="{{$students->YearGraduate}}">
            </div>


            <div class="text-center">
                <input type="submit" name="insert"  class="" value="Insert" style="height: 50px; width: 30%;" >
            </div>

    </form>
</div>
@endforeach