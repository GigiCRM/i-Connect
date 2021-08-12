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
Use Auth;
Use Session;

class AdminController extends Controller
{
    public function insertJob()
    {
        return view('admin/insertJob');
    }

    public function store(){    //step 2 
        $r=request(); //step 3 get data from HTML
        $image=$r->file('image');   //step to upload image get the file input
        $image->move('img',$image->getClientOriginalName());   //images is the location                
        $imageName=$image->getClientOriginalName(); 

        $addJob=Job::create([    //step 3 bind data
            'publisherId'=>$r->publisherId, //add on 
            'jobName'=>$r->jobName, //fullname from HTML
            'position'=>$r->position,
            'salary'=>$r->salary,
            'qualification'=>$r->qualification,
            'location'=>$r->location,
            'workingHour'=>$r->workingHour,
            'typeOfJob'=>$r->typeOfJob,
            'description'=>$r->description,
            'employeeType'=>$r->employeeType,
            'status'=>0,
            'image'=>$imageName,
            
        ]);
        Session::flash('success',"Job insert succesful!");

        return redirect()->route('admin.home');
    }

    public function showJob(){
        $jobs=Job::paginate(12);
        
        return view('admin/showJob')->with('jobs',$jobs);
    }

    public function approval($id){
        $jobs =Job::all()->where('id',$id);
        $r=request();
        $jobs = Job::find($r->id);
        $jobs->status ="Valid";
        $jobs->save();

         return redirect()->route('showJob')->with('jobs',$jobs);
    }

    public function studentList(){

        $students=DB::table('profile_students')
        ->select('profile_students.*')
        ->get();

        return view('admin/studentList')->with('students',$students);
    }

    public function studentProfile($id){
       $students=Profile_student::all()->where('id',$id);
    
        return view('admin/studentProfile')->with('students',$students);

    }

    public function showInternStatus(){
        
        $internStatus=DB::table('intern_statuses')
        ->leftJoin('profile_students','profile_students.Email','=','intern_statuses.email')
        ->select('profile_students.Name as studentName','profile_students.StudentID as studentID','profile_students.Email as studentEmail','intern_statuses.*')
        ->get();

        return view('admin/showStudentStatus')->with('internStatus',$internStatus);
    }

    public function insertEnrolmentSubject()
    {
        return view('admin/insertEnrolSubject');
    } 

    public function storeEnrolmentSubject(){    //step 2 
        $r=request(); //step 3 get data from HTML
        $creator=Auth::user()->id;

        $addSubject=Enrolment_subject::create([    //step 3 bind data
            'creatorId'=>$creator, //add on 
            'subjectName'=>$r->subjectName, //fullname from HTML
            'subjectCode'=>$r->subjectCode,
            'lecturerId'=>$r->lecturerId,
            'lecturerEmail'=>$r->lecturerEmail,
            'faculty'=>$r->faculty,
            'availableNo'=>$r->availableNo,
        
            
        ]);
        Session::flash('success',"Subject insert succesful!");

        return redirect()->route('showEnrolmentSubject');
    }

    public function showEnrolmentSubject(){
        $enrolmentSubject=Enrolment_subject::paginate(12);
        
        return view('admin/showEnrolmentSubject')->with('enrolmentSubject',$enrolmentSubject);
    }

    public function editEnrolmentSubject($id){
       
        $enrolmentSubject =Enrolment_subject::all()->where('id',$id);
        
        return view('admin/editEnrolmentSubject')->with('enrolmentSubject',$enrolmentSubject);
                       
    }

    public function updateEnrolmentSubject(){
        $r=request();
        $enrolmentSubject =Enrolment_subject::find($r->id);
        $enrolmentSubject->subjectName=$r->subjectName;
        $enrolmentSubject->subjectCode=$r->subjectCode;
        $enrolmentSubject->lecturerId=$r->lecturerId;
        $enrolmentSubject->lecturerEmail=$r->lecturerEmail;
        $enrolmentSubject->faculty=$r->faculty;
        $enrolmentSubject->availableNo=$r->availableNo;
        $enrolmentSubject->save();

        return redirect()->route('showEnrolmentSubject');

    }

    public function deleteEnrolmentSubject($id){
        $enrolmentSubject=Enrolment_subject::find($id);
        $enrolmentSubject->delete();
        return redirect()->route('showEnrolmentSubject');
    }

    public function showCompanyList(){
        $company=Profile_company::paginate(12);
        
        return view('admin/showCompanyList')->with('company',$company);
    }

    public function editCompanyProfile($id){
        $profile =Profile_company::all()->where('id',$id);

        return view('admin/editCompanyProfile')->with('profile',$profile);
    }

    public function updateCompanyProfile(){
        $r=request();
        $profile =Profile_company::find($r->id);
        if($r->file('image')!=''){
            $image=$r->file('image');        
            $image->move('img',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $profile->image=$imageName;
            }     
            $profile->name=$r->name;
            $profile->type=$r->type;
            $profile->address=$r->address;
            $profile->contact=$r->contact;
            $profile->ssm=$r->ssm;
            $profile->save(); 
            return redirect()->route('admin.showCompanyProfile');

    }

    public function deleteCompanyProfile($id){
        $profile=Profile_company::find($id);
        $profile->delete();
        return redirect()->route('admin.showCompanyProfile');
    }
 

}
