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

class AlumniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function insertProfile()
    {
        return view('alumni/studentProfileForm');
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

        return redirect()->route('alumni.home');
    }

    public function show(){
        $email=Auth::user()->email;
        $students=DB::table('profile_students')
        ->leftjoin('users','users.email','=','profile_students.Email')
        ->select('users.*','profile_students.*')
        ->where('users.email','=',$email)
        ->get();

        return view('alumni/studentProfile')->with('students',$students);
                               
    }

    public function studentProfile(){
     
        $email=Auth::user()->email;
        $students=DB::table('profile_students')
        ->leftjoin('users','users.email','=','profile_students.Email')
        ->select('users.*','profile_students.*')
        ->where('users.email','=',$email)
        ->get();

        return view('alumni/studentHome')->with('students',$students);
    }

    public function edit($id){
       
        $students =Profile_student::all()->where('id',$id);
        //select * from products where id='$id'
        
        return view('alumni/editStudentProfile')->with('students',$students);
                       
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
        return redirect()->route('alumni.showStudentProfile');
       }

       public function showJob(){

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=','Valid')->orderBy('id','asc')
        ->paginate(10);

        return view('alumni/viewJob')->with('job',$job);
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

        return redirect()->route('alumni.viewJob');
    }

    public function showCompanyList(){
        $companies=Profile_company::paginate(6);
        
        return view('alumni/showCompanyList')->with('companies',$companies);
    }

    public function showAppliedJob(){
        $studentId=Auth::user()->id; 

        $jobs=DB::table('applied_jobs')            
        ->leftJoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->leftJoin('users','users.id','=','applied_jobs.publisherId')
        ->select('jobs.jobName as jobName','jobs.image as jobImage','jobs.position as jobPosition','jobs.salary as jobSalary','jobs.qualification as jobQualification','jobs.location as jobLocation','jobs.workingHour as jobWorkingHour','jobs.typeOfJob as jobTypeOfJob','jobs.description as jobDescription','jobs.employeeType as jobEmployeeType','applied_jobs.*','users.name as publisherName')
        ->where('applied_jobs.studentId','=',$studentId)->orderBy('jobName','asc')
        ->paginate(10);

        return view('alumni/showAppliedJob')->with('jobs',$jobs);


    }

    public function showApprovedJob(){
        $studentId=Auth::user()->id; 

        $jobs=DB::table('applied_jobs')
        ->leftjoin('profile_students','profile_students.StudentNo','=','applied_jobs.studentId')
        ->leftjoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->select('profile_students.Name as studentName','profile_students.Email as studentEmail','profile_students.Contact as studentContact','jobs.jobName as JobName','applied_jobs.*')
        ->where('applied_jobs.studentId','=',$studentId)
        ->where('applied_jobs.status','=','Approved')->orderBy('jobName','asc')
        ->paginate(10);

        return view('alumni/approvedJobList')->with('jobs',$jobs);
    }

    public function declineJobRequet($id){
        $appliedJobs=AppliedJob::find($id);
        $appliedJobs->delete();
        return redirect()->route('alumni.showApprovedJob');
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
        }) ->paginate(10);
 
        return view('alumni/viewJob')->with('job',$job);
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

      
        return view('alumni/showCompanyList')->with('companies',$companies);
    }



}
