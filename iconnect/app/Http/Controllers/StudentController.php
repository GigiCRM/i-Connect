<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile_student; 
use App\Models\User; 
use App\Models\Job; 
use App\Models\AppliedJob; 

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

        $jobs=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=','Valid')
        ->get();

        return view('student/viewJob')->with('jobs',$jobs);
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

    public function apply(){
        $r=request(); 
        $jobId =Job::find($r->id);    
        $studentId=Auth::user()->id; 

        $addApply=AppliedJob::updateOrCreate([    
            'jobId'=>$id, 
            'studentId'=>$studentId, 
            'status'=>"Pending",
          
        ]);
        Session::flash('success',"Successfully Applied !");

        return redirect()->route('viewJob');
    }
    

}

   