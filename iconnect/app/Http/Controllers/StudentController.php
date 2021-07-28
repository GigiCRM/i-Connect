<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile_student; 
use App\Models\User; 
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

        $addStudentProfile=Profile_student::create([    //step 3 bind data
            'Name'=>$r->name, //add on 
            'Gender'=>$r->gender, //fullname from HTML
            'StudentID'=>$r->studentId,
            'Batch_No'=>$r->batchNo,
            'Email'=>$r->email,
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
       
        $students=DB::table('profile_students')
        ->join('users','profile_students.Email','=','users.email')
        ->select('profile_students.*')
        ->get();

        return view('student/studentHome')->with('students',$students);
                               
    }

    public function studentProfile(){
    
        $students=DB::table('profile_students')
        ->join('users','profile_students.Email','=','users.email')
        ->select('profile_students.*')
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
       
    $students=DB::table('profile_students')
    ->join('users','profile_students.Email','=','users.email')
    ->select('profile_students.*')
    ->get();

    return view('student/studentResume')->with('students',$students);
                           
}
}
