<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job; 
use App\Models\User; 
use App\Models\Profile_student; 
use App\Models\InternStatus; 
use App\Models\Enrolment_subject; 
use App\Models\Enrolment_student; 
use App\Models\Profile_company;
use App\Models\AppliedJob;
use App\Models\InternDetail;
use App\Models\Report;
use App\Models\InternForm;

Use Auth;
Use Session;

class StudentController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function insertProfile()
    {
        return view('student/studentProfileForm');
    }

    public function store(){    //step 2 
        $r=request(); //step 3 get data from HTML

        $image=$r->file('project-image');   //step to upload image get the file input
        $image->move('img',$image->getClientOriginalName());   //images is the location                
        $imageName=$image->getClientOriginalName(); 

        $resultImage=$r->file('result-image');   //step to upload image get the file input
        $resultImage->move('img',$resultImage->getClientOriginalName());   //images is the location                
        $RImage=$resultImage->getClientOriginalName();
        
        $profileImage=$r->file('profile-image');   //step to upload image get the file input
        $profileImage->move('img',$profileImage->getClientOriginalName());   //images is the location                
        $PImage=$profileImage->getClientOriginalName();

        $addStudentProfile=Profile_student::updateOrCreate([    //step 3 bind data
            'Name'=>$r->name, //add on 
            'Gender'=>$r->gender, //fullname from HTML
            'StudentNo'=>Auth::user()->id,
            'StudentID'=>$r->studentId,
            'Batch_No'=>$r->batchNo,
            'Email'=>Auth::user()->email,
            'Contact'=>$r->contact,
            'University'=>$r->university,
            'FieldOfStudy'=>$r->fOStudy,
            'Program'=>$r->program,
            'GPA'=>$r->gpa,
            'YearGraduate'=>$r->yearGraduate,
            'RelevantProject'=>$imageName,
            'Result'=>$RImage,
            'Image'=>$PImage,
            
        ]);
        Session::flash('success',"Profile edited succesful!");

        return redirect()->route('student.home');
    }

    public function show(){
        $email=Auth::user()->email;
        $students=DB::table('profile_students')
        ->leftjoin('users','users.email','=','profile_students.Email')
        ->select('users.*','profile_students.*')
        ->where('users.email','=',$email)
        ->get();

        return view('student/studentProfile')->with('students',$students);
                               
    }

    public function studentProfile(){
     
        $email=Auth::user()->email;
        $students=DB::table('profile_students')
        ->leftjoin('users','users.email','=','profile_students.Email')
        ->select('users.*','profile_students.*')
        ->where('users.email','=',$email)
        ->get();

        return view('student/studentHome')->with('students',$students);
    }

    public function edit($id){
       
        $students =Profile_student::all()->where('id',$id);
        //select * from products where id='$id'
        
        return view('student/editStudentProfile')->with('students',$students);
                       
    }

   public function update(){
    $r=request();//retrive submited form data
    $students =Profile_student::find($r->id);  //get the record based on product ID           
    $students->name=$r->name;
    $students->studentId=$r->studentId;
    $students->email=$r->email;
    $students->contact=$r->contact;
    $students->university=$r->university;
    $students->gpa=$r->gpa;
    $students->yearGraduate=$r->yearGraduate;
    $students->save();
    return redirect()->route('showStudentProfile');
   }

   public function showResume(){
       
    $email=Auth::user()->email;
        $students=DB::table('profile_students')
        ->leftjoin('users','users.email','=','profile_students.Email')
        ->select('users.*','profile_students.*')
        ->where('users.email','=',$email)
        ->get();

    return view('student/studentResume')->with('students',$students);
                           
}

    public function showJob(){

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=','Valid')->orderBy('id','asc')
        ->paginate(8);

        return view('student/jobListing')->with('job',$job);
    }

    public function showInternStatus(){
       
            $email=Auth::user()->email;
            $internStatus=DB::table('intern_statuses')            
            ->leftJoin('users','users.email','=','intern_statuses.email')
            ->leftJoin('profile_students','profile_students.Email','=','users.email')                        
            ->select('profile_students.Image as studentImage','intern_statuses.*')
            ->where('users.email','=',$email)
            ->get();
    
        return view('student/showStatus')->with('internStatus',$internStatus);
                               
    }

    public function apply($id){
        $jobs =Job::all()->where('id',$id);
        $r=request(); 
        $jobId =Job::find($r->id);    
        $studentId=Auth::user()->id; 

        $addApply=AppliedJob::updateOrCreate([    
            'jobId'=>$id, 
            'publisherId'=>$jobId->publisherId,
            'studentId'=>$studentId, 
            'status'=>"Pending",
          
        ]);
        Session::flash('success',"Successfully Applied !");

        return redirect()->route('viewJob');
    }

    public function showCompanyList(){
        $companies=Profile_company::paginate(7);
        
        return view('student/showCompanyList')->with('companies',$companies);
    }

    public function showAppliedJob(){
        $studentId=Auth::user()->id; 

        $jobs=DB::table('applied_jobs')            
        ->leftJoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->select('jobs.jobName as jobName','jobs.image as jobImage','jobs.position as jobPosition','jobs.salary as jobSalary','jobs.qualification as jobQualification','jobs.location as jobLocation','jobs.workingHour as jobWorkingHour','jobs.typeOfJob as jobTypeOfJob','jobs.description as jobDescription','jobs.employeeType as jobEmployeeType','applied_jobs.*')
        ->where('applied_jobs.studentId','=',$studentId)->orderBy('jobName','asc')
        ->paginate(8);

        return view('student/showAppliedJob')->with('jobs',$jobs);


    }

    public function showApprovedJob(){
        $studentId=Auth::user()->id; 

        $jobs=DB::table('applied_jobs')
        ->leftjoin('profile_students','profile_students.StudentNo','=','applied_jobs.studentId')
        ->leftjoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->select('profile_students.Name as studentName','profile_students.Email as studentEmail','profile_students.Contact as studentContact','jobs.jobName as JobName','applied_jobs.*')
        ->where('applied_jobs.studentId','=',$studentId)
        ->where('applied_jobs.status','=','Approved')->orderBy('jobName','asc')
        ->paginate(8);

        return view('student/approvedJobList')->with('jobs',$jobs);
    }
//------interndetail
    public function InterDetail($id){
        $internDetail=AppliedJob::all()->where('id',$id);
        $r=request(); 
        $appliedJobId =AppliedJob::find($r->id);    
        $studentId=Auth::user()->id; 

        $addInternDetail=InternDetail::updateOrCreate([    
            'studentId'=>$studentId, 
            'publisherId'=>$appliedJobId->publisherId,
            'jobId'=>$appliedJobId->jobId, 
          
        ]);
        Session::flash('success',"Accpeted invitation!");

        return redirect()->route('student.showApprovedJob');
    }

    public function showInternDetail(){

        $studentId=Auth::user()->id; 

        $internStatus=DB::table('intern_details')            
        ->leftJoin('jobs','jobs.id','=','intern_details.jobId')
        ->leftJoin('users','users.id','=','intern_details.publisherId')
        ->leftJoin('intern_statuses','intern_statuses.studentId','=','intern_details.studentId')
        ->leftJoin('profile_students','profile_students.StudentNo','=','intern_details.studentId')
        ->select('jobs.jobName as jobName','jobs.image as jobImage','jobs.position as jobPosition','jobs.salary as jobSalary','jobs.location as jobLocation','jobs.workingHour as jobWorkingHour','jobs.typeOfJob as jobTypeOfJob','jobs.companyName as jobCompanyName','intern_details.*','intern_statuses.status as internStatus','profile_students.Image as studentImage','users.name as publisherName')
        ->where('intern_details.studentId','=',$studentId)
        ->get();

        return view('student/showInternDetail')->with('internStatus',$internStatus);
    }

    public function declineJobRequet($id){
        $appliedJobs=AppliedJob::find($id);
        $appliedJobs->delete();
        return redirect()->route('student.showApprovedJob');
    }

    public function showSubject(){
        $enrolmentSubjects=Enrolment_subject::paginate(8);

        return view('student/viewEnrolmentSubject')->with('enrolmentSubjects',$enrolmentSubjects);

    }

    public function enrollSubject($id){
        $subject=Enrolment_subject::all()->where('id',$id);
        $r=request(); 
        $enrolSubject =Enrolment_subject::find($r->id);    
        $studentId=Auth::user()->id; 
    
        $add=Enrolment_student::updateOrCreate([    
            'studentId'=>$studentId, 
            'subjectId'=>$enrolSubject->id, 
            'subjectName'=>$enrolSubject->subjectName,
            'subjectCode'=>$enrolSubject->subjectCode, 
            'lecturerId'=>$enrolSubject->lecturerId, 
            'lecturerEmail'=>$enrolSubject->lecturerEmail, 
            'faculty'=>$enrolSubject->faculty, 
            'availableNo'=>($enrolSubject->availableNo -1), 

          
        ]);
        Session::flash('success',"Successfully enroll in!");       

        return redirect()->route('student.showSubject');
    }

    public function showEnrolSubject(){
            
        $studentId=Auth::user()->id;    
        $email=Auth::user()->email;              
        $students=DB::table('profile_students')
        ->leftjoin('users','users.email','=','profile_students.Email')
        ->leftjoin('enrolment_students','enrolment_students.studentId','=','profile_students.StudentNo')
        ->select('users.*','profile_students.*','enrolment_students.*','enrolment_students.subjectId as SsubjectId')
        ->where('users.email','=',$email)
        ->where('enrolment_students.studentId','=',$studentId)
        ->get();

    return view('student/showEnrolSubject')->with('students',$students);
    }

    public function showClassroomPost($id){
        $subject=Enrolment_subject::all()->where('id',$id);
        $r=request(); 
        $subjectId =Enrolment_subject::find($r->id); 
        
        $posts=DB::table('posts')
        ->leftjoin('users','users.id','=','posts.publisherId')
        ->leftjoin('enrolment_subjects','enrolment_subjects.id','=','posts.subjectId')
        ->select('users.name as publisherName','posts.*','enrolment_subjects.*')
        ->where('posts.subjectId','=',$id)
        ->get();

    return view('student/showClassroomPost')->with('posts',$posts);
        
    }

    public function insertReport(){
       
        return view('student/insertReport');
    }

    public function insertInternForm(){

        return view('student/insertInternForm');
    }

    public function storeInternForm(){
        $r=request(); 
        $studentId=Auth::user()->id;    

        $addInternForm=InternForm::updateOrCreate([    
            'studentId'=>$studentId, 
            'studentName'=>$r->studentName, 
            'faculty'=>$r->faculty, 
            'program'=>$r->program,
            'address'=>$r->address,
            'contact'=>$r->contact, 
            'companyName'=>$r->companyName,
            'companyAddress'=>$r->companyAddress,
            'jobType'=>$r->jobType,
            'jobName'=>$r->jobName,
            'position'=>$r->position,
            'salary'=>$r->salary,
            'status'=>"Pending",
            
        ]);
        Session::flash('success',"Form submit successfully");

        return redirect()->route('student.home');
    }

    public function showInternForm(){
        $studentId=Auth::user()->id;

        $internForm=DB::table('intern_forms')
        ->select('intern_forms.*')
        ->where('intern_forms.studentId','=',$studentId)
        ->get();

        return view('student/showInternForm')->with('internForm',$internForm);
    }

    public function editInternForm($id){
       
        $internForm =InternForm::all()->where('id',$id);
        
        return view('student/editInternForm')->with('internForm',$internForm);
                       
    }

   public function updateInternForm(){
    $r=request();
    $internForm =InternForm::find($r->id); 
    $internForm->studentName=$r->studentName;
    $internForm->faculty=$r->faculty;
    $internForm->program=$r->program;
    $internForm->address=$r->address;
    $internForm->contact=$r->contact;
    $internForm->companyName=$r->companyName;
    $internForm->companyAddress=$r->companyAddress;
    $internForm->jobType=$r->jobType;
    $internForm->jobName=$r->jobName;
    $internForm->position=$r->position;
    $internForm->salary=$r->salary;
    $internForm->save();

    return redirect()->route('student.showInternForm');
   }

   public function searchJob(){
        
    $job=DB::table('jobs')
    ->select('jobs.*')
    ->where('jobs.status','=','Valid')->where(function($query){  
        $r=request();//retrive submited form data
        $keyword=$r->searchJob;

        $query->orWhere('jobs.jobName', 'like', '%' . $keyword . '%')
        ->orWhere('jobs.position', 'like', '%' . $keyword . '%')
        ->orWhere('jobs.typeOfJob', 'like', '%' . $keyword . '%')
        ->orWhere('jobs.employeeType', 'like', '%' . $keyword . '%')
        ->where('jobs.status','=','Valid');

    }) ->paginate(8);


    return view('student/jobListing')->with('job',$job);
}

public function searchSubjectList(){


    $r=request();//retrive submited form data
    $keyword=$r->searchJob;
    $enrolmentSubjects=DB::table('enrolment_subjects')
    ->where('enrolment_subjects.subjectName', 'like', '%' . $keyword . '%')
    ->orWhere('enrolment_subjects.subjectCode', 'like', '%' . $keyword . '%')
    ->orWhere('enrolment_subjects.faculty', 'like', '%' . $keyword . '%')
    ->paginate(6);


    return view('student/viewEnrolmentSubject')->with('enrolmentSubjects',$enrolmentSubjects);
}

public function searchCompany(){
    $r=request();//retrive submited form data
    $keyword=$r->searchJob;
    $companies=DB::table('profile_companies')
    ->where('profile_companies.name', 'like', '%' . $keyword . '%')
    ->orWhere('profile_companies.type', 'like', '%' . $keyword . '%')
    ->orWhere('profile_companies.address', 'like', '%' . $keyword . '%')
    ->orWhere('profile_companies.ssm', 'like', '%' . $keyword . '%')
    ->paginate(6);

  
    return view('student/showCompanyList')->with('companies',$companies);
}




}

   