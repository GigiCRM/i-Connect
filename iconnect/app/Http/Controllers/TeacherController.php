<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job; 
use App\Models\User; 
use App\Models\Profile_student; 
use App\Models\InternStatus; 
use App\Models\Enrolment_subject; 
use App\Models\Profile_company;
use App\Models\AppliedJob;
use App\Models\InternDetail;
use App\Models\Profile_Teacher;
use App\Models\Enrolment_student;
use App\Models\Classroom;
use App\Models\Post;
use App\Models\InternForm;


Use Auth;
Use Session;

class TeacherController extends Controller
{
    public function insertProfile(){
        return view('teacher/insertProfile');
    }

    public function storeProfile(){
        $r=request(); 
        $teacherId=Auth::user()->id;

        $image=$r->file('image');   
        $image->move('img',$image->getClientOriginalName());                 
        $imageName=$image->getClientOriginalName(); 

        $addProfile=Profile_Teacher::updateOrCreate([   
            'teacherId'=>$teacherId,  
            'name'=>$r->name,
            'faculty'=>$r->faculty,
            'image'=>$imageName,
  
        ]);

        return redirect()->route('teacher.home');
    }

    public function showProfile(){
        $teacherId=Auth::user()->id;
        $profile=Profile_Teacher::all()->where('teacherId',$teacherId);

        return view('teacher/teacherProfile')->with('profile',$profile);
    }

    public function editProfile($id){
        $profile =Profile_Teacher::all()->where('id',$id);

        return view('teacher/editteacherProfile')->with('profile',$profile);
    }

    public function updateProfile(){
        $r=request();
        $profile =Profile_Teacher::find($r->id);
        if($r->file('image')!=''){
            $image=$r->file('image');        
            $image->move('img',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $profile->image=$imageName;
            }     
            $profile->name=$r->name;
            $profile->faculty=$r->faculty;
            $profile->save(); 
            return redirect()->route('showTeacherProfile');

    }

    public function insertJob()
    {
        return view('teacher/insertJob');
    }

    public function store(){    //step 2 
        $r=request(); //step 3 get data from HTML
        $publisherId=Auth::user()->id;

        $image=$r->file('image');   //step to upload image get the file input
        $image->move('img',$image->getClientOriginalName());   //images is the location                
        $imageName=$image->getClientOriginalName(); 

        $addJob=Job::create([    //step 3 bind data
            'publisherId'=>$publisherId, //add on 
            'companyName'=>$r->companyName, //fullname from HTML
            'jobName'=>$r->jobName, //fullname from HTML
            'position'=>$r->position,
            'salary'=>$r->salary,
            'qualification'=>$r->qualification,
            'location'=>$r->location,
            'workingHour'=>$r->workingHour,
            'typeOfJob'=>$r->typeOfJob,
            'description'=>$r->description,
            'employeeType'=>$r->employeeType,
            'status'=>"Invalid",
            'image'=>$imageName,
            
        ]);
        Session::flash('success',"Job insert succesful!");

        return redirect()->route('teacher.showJob');
    }

    public function showJob(){
        $publisherId=Auth::user()->id;
        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('publisherId',$publisherId)
        ->paginate(10);
          
        return view('teacher/jobListing')->with('job',$job);
    }

    public function editJob($id){
        $jobs =Job::all()->where('id',$id);

        return view('teacher/editJob')->with('jobs',$jobs);
    }

    public function updateJob(){
        $r=request();
        $jobs =Job::find($r->id);
        if($r->file('job-image')!=''){
            $image=$r->file('job-image');        
            $image->move('img',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $jobs->image=$imageName;
            }        
        $jobs->publisherId=$r->publisherId;
        $jobs->companyName=$r->companyName;
        $jobs->jobName=$r->jobName;
        $jobs->position=$r->position;
        $jobs->salary=$r->salary;
        $jobs->qualification=$r->qualification;
        $jobs->location=$r->location;
        $jobs->workingHour=$r->workingHour;
        $jobs->typeOfJob=$r->typeOfJob;
        $jobs->description=$r->description;
        $jobs->employeeType=$r->employeeType;
        $jobs->save();

        return redirect()->route('teacher.showJob');

    }

    public function deleteJob($id){
        $jobs=Job::find($id);
        $jobs->delete();
        return redirect()->route('teacher.showJob');
    }

    public function showCompanyList(){
        $companies=Profile_company::paginate(6);
        
        return view('teacher/showCompanyList')->with('companies',$companies);
    }

    public function showSubjectList(){
        $teacherId=Auth::user()->id;

        $subjectLists=DB::table('enrolment_subjects')
        ->select('enrolment_subjects.*')
        ->where('lecturerId',$teacherId)
        ->paginate(6);

        return view('teacher/showSubjectList')->with('subjectLists',$subjectLists);
    }

    public function showStudentList($id){
        $subject =Enrolment_subject::all()->where('id',$id);
        $r=request();
        $subjectId =Enrolment_subject::find($r->id);

        $students=DB::table('enrolment_students')
        ->leftJoin('enrolment_subjects','enrolment_subjects.id','=','enrolment_students.subjectId')
        ->leftJoin('profile_students','profile_students.StudentNo','=','enrolment_students.studentId')
        ->select('profile_students.Name as sName','profile_students.Batch_No as sBatch_No','profile_students.Email as sEmail','profile_students.Contact as sContact','profile_students.FieldOfStudy as sFieldOfStudy','enrolment_subjects.*','enrolment_students.*')
        ->where('enrolment_students.subjectId','=',$id)        
        ->get();

        return view('teacher/showStudentList')->with('students',$students);
    }

    public function addClassroom($id){
        $subject =Enrolment_subject::all()->where('id',$id);
        $r=request(); 
        $subjectId =Enrolment_subject::find($r->id);

        
        $addClassroom=Classroom::updateOrCreate([    
            'subjectId'=>$subjectId->id,
            'subjectName'=>$subjectId->subjectName,
            'subjectCode'=>$subjectId->subjectCode, 
          
        ]);

        return redirect()->route('teacher.showClassroom');
    }

    public function showClassroom(){
        $classroom =Classroom::all();
      
        return view('teacher/showClassroom')->with('classroom',$classroom);
    }

    public function insertPost(){
        return view('teacher/insertPost');
    }

    public function getSubjectId($id){
        $classroom =Classroom::all()->where('id',$id);

        return view('teacher/insertPost')->with('classroom',$classroom);
    }

    public function storePost(){  
        $r=request(); 
        $classroomId =Classroom::find($r->id);
        $publisherId=Auth::user()->id;

        $image=$r->file('image');  
        $image->move('img',$image->getClientOriginalName()); 
        $imageName=$image->getClientOriginalName(); 

        $addPost=Post::updateOrCreate([   
            'publisherId'=>$publisherId, 
            'subjectId'=>$r->subjectId, 
            'title'=>$r->title, 
            'comment'=>$r->comment,
            'content'=>$r->content,
            'image'=>$imageName,
            
        ]);
        Session::flash('success',"Posted");

        return redirect()->route('teacher.showSubjectList');
    }

    public function showPost($subjectId){
        $classroom =Classroom::all()->where('subjectId',$subjectId);
        $r=request();
        $classroomId =Classroom::find($r->subjectId);

        $posts=DB::table('posts')
        ->leftJoin('classrooms','classrooms.subjectId','=','posts.subjectId')
        ->leftJoin('users','users.id','=','posts.publisherId')
        ->select('classrooms.*','users.name as publisherName','posts.*')
        ->where('posts.subjectId','=',$subjectId)        
        ->get();

        return view('teacher/showPost')->with('posts',$posts);
    }

    public function viewReport($studentId){
        $students =Enrolment_student::all()->where('studentId',$studentId);
        $r=request();
        $studentsId =Enrolment_student::find($r->id);

        $posts=DB::table('reports')
        ->leftJoin('enrolment_students','enrolment_students.studentId','=','reports.userId')
        ->select('reports.*','enrolment_students.*')
        ->where('reports.userId','=',$studentId)        
        ->get();

        return view('teacher/viewReport')->with('posts',$posts);
    }

    public function viewInternForm($studentId){
        $students =Enrolment_student::all()->where('studentId',$studentId);
        $r=request();
        $studentsId =Enrolment_student::find($r->id);

        
        $internForm=DB::table('intern_forms')
        ->leftJoin('enrolment_students','enrolment_students.studentId','=','intern_forms.studentId')
        ->select('intern_forms.*','enrolment_students.*')
        ->where('intern_forms.studentId','=',$studentId)        
        ->get();

        return view('teacher/viewInternForm')->with('internForm',$internForm);
    }

    public function approveInternForm($id){
        $internForm =InternForm::all()->where('id',$id);
        $r=request();
        $internForm = InternForm::find($r->id);
        $internForm->status ="Approved";
        $internForm->save();

         return redirect()->route('teacher.showSubjectList')->with('internForm',$internForm);
    }

    public function rejectInternForm($id){
        $internForm =InternForm::all()->where('id',$id);
        $r=request();
        $internForm = InternForm::find($r->id);
        $internForm->status ="Rejected";
        $internForm->save();

         return redirect()->route('teacher.showSubjectList')->with('internForm',$internForm);
    }

    public function showValidJob(){
        $job=Job::paginate(12);

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=',"Valid")
        ->paginate(10);
        
        return view('teacher/showJob')->with('job',$job);
    }

    public function showFullTime(){
        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=','Valid')
        ->where('jobs.typeOfJob','=',"Full-time")
        ->paginate(10);
        
        return view('teacher/showJob')->with('job',$job);
    }

    public function showPartTime(){
        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=','Valid')
        ->where('jobs.typeOfJob','=',"Part-time")
        ->paginate(10);
        
        return view('teacher/showJob')->with('job',$job);
    }

    public function searchSubjectList(){

        $lecturerId=Auth::user()->id;

        $subjectLists=DB::table('enrolment_subjects')
        ->select('enrolment_subjects.*')
        ->where('enrolment_subjects.lecturerId','=',$lecturerId)->where(function($query){  
            $r=request();//retrive submited form data
            $keyword=$r->searchJob;

            $query->orWhere('enrolment_subjects.subjectName', 'like', '%' . $keyword . '%')
            ->orWhere('enrolment_subjects.subjectCode', 'like', '%' . $keyword . '%')
            ->orWhere('enrolment_subjects.faculty', 'like', '%' . $keyword . '%');
        }) ->paginate(10);
 
        return view('teacher/showSubjectList')->with('subjectLists',$subjectLists);
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
 
        return view('teacher/showJob')->with('job',$job);
    }

    public function searchJobRecord(){
        $publisherId=Auth::user()->id;

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.publisherId','=', $publisherId)->where(function($query){  
            $r=request();//retrive submited form data
            $keyword=$r->searchJob;

            $query->orWhere('jobs.jobName', 'like', '%' . $keyword . '%')
            ->orWhere('jobs.position', 'like', '%' . $keyword . '%')
            ->orWhere('jobs.typeOfJob', 'like', '%' . $keyword . '%')
            ->orWhere('jobs.employeeType', 'like', '%' . $keyword . '%');
        }) ->paginate(10);
 
        return view('teacher/jobListing')->with('job',$job);
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

      
        return view('teacher/showCompanyList')->with('companies',$companies);
    }

    public function deletePost($id){
        $posts= Post::find($id);
        $posts->delete();
        return redirect()->route('teacher.showClassroom');
    }

    public function editPost($id){
        $posts =Post::all()->where('id',$id);

        return view('teacher/editPost')->with('posts',$posts);
    }

    public function updatePost(){
        $r=request();
        $posts =Post::find($r->id);
        if($r->file('posts-image')!=''){
            $image=$r->file('posts-image');        
            $image->move('img',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $posts->image=$imageName;
            }        
        $posts->title=$r->title;
        $posts->comment=$r->comment;
        $posts->content=$r->content;
        $posts->save();

        return redirect()->route('teacher.showClassroom');

    }

   


}
