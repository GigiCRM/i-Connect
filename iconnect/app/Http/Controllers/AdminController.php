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
            'companyName'=>$r->companyName, //add on 
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

        return redirect()->route('showJob');
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

    public function decline($id){
        $jobs =Job::all()->where('id',$id);
        $r=request();
        $jobs = Job::find($r->id);
        $jobs->status ="Invalid";
        $jobs->save();

         return redirect()->route('showJob')->with('jobs',$jobs);
    }

    public function studentList(){

        $student=DB::table('profile_students')
        ->select('profile_students.*')
        ->paginate(10);

        return view('admin/studentList')->with('student',$student);
    }

    public function studentProfile($id){
       $students=Profile_student::all()->where('id',$id);
    
        return view('admin/studentProfile')->with('students',$students);

    }

    public function showInternStatus(){
        
        $internStatuss=DB::table('intern_statuses')
        ->leftJoin('profile_students','profile_students.Email','=','intern_statuses.email')
        ->select('profile_students.FieldOfStudy as FieldOfStudy','profile_students.Program as Program','profile_students.Name as studentName','profile_students.StudentID as studentID','profile_students.Email as studentEmail','intern_statuses.*')
        ->paginate(10);
        
        return view('admin/showStudentStatus')->with('internStatuss',$internStatuss);
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
        $enrolmentSubjects=Enrolment_subject::paginate(8);
        
        return view('admin/showEnrolmentSubject')->with('enrolmentSubjects',$enrolmentSubjects);
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
        $companies=Profile_company::paginate(6);
        
        return view('admin/showCompanyList')->with('companies',$companies);
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

        Session::flash('success',"Approved!");

    }

    public function searchStudent(){
        $r=request();//retrive submited form data
        $keyword=$r->searchJob;
        $student=DB::table('profile_students')
        ->where('profile_students.Name', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.Program', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.StudentID', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.Batch_No', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.Email', 'like', '%' . $keyword . '%')
        ->paginate(6);

      
        return view('admin/studentList')->with('student',$student);
    }

    public function searchInternStatus(){
        $r=request();//retrive submited form data
        $keyword=$r->searchJob;
        $internStatuss=DB::table('intern_statuses')
        ->leftJoin('profile_students','profile_students.Email','=','intern_statuses.email')
        ->select('profile_students.FieldOfStudy as FieldOfStudy','profile_students.Program as Program','profile_students.Name as studentName','profile_students.StudentID as studentID','profile_students.Email as studentEmail','intern_statuses.*')
        ->where('profile_students.Name', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.Program', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.StudentID', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.Email', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.FieldOfStudy', 'like', '%' . $keyword . '%')
        ->paginate(6);

      
        return view('admin/showStudentStatus')->with('internStatuss',$internStatuss);
    }

    public function showAlumniList(){

        $student=DB::table('profile_students')
        ->leftJoin('users','users.id','=','profile_students.StudentNo')
        ->select('profile_students.*')
        ->where('users.is_alumni','=',1)
        ->paginate(10);
        
        return view('admin/showAlumniList')->with('student',$student);
    }

    public function searchAlumni(){
        $r=request();//retrive submited form data
        $keyword=$r->searchJob;
        $student=DB::table('profile_students')
        ->where('profile_students.Name', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.Program', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.StudentID', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.Batch_No', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.Email', 'like', '%' . $keyword . '%')
        ->paginate(6);

         
        return view('admin/showAlumniList')->with('student',$student);
    }

    public function searchSubject(){
        $r=request();//retrive submited form data
        $keyword=$r->searchJob;
        $enrolmentSubjects=DB::table('enrolment_subjects')
        ->where('enrolment_subjects.subjectName', 'like', '%' . $keyword . '%')
        ->orWhere('enrolment_subjects.subjectCode', 'like', '%' . $keyword . '%')
        ->orWhere('enrolment_subjects.lecturerEmail', 'like', '%' . $keyword . '%')
        ->orWhere('enrolment_subjects.Faculty', 'like', '%' . $keyword . '%')
        ->orWhere('enrolment_subjects.lecturerId', 'like', '%' . $keyword . '%')
        ->paginate(10);
        
        return view('admin/showEnrolmentSubject')->with('enrolmentSubjects',$enrolmentSubjects);
    }

    public function showInvalidJob(){
        $job=Job::paginate(12);

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=',"Invalid")
        ->paginate(10);
        
        return view('admin/showJob')->with('job',$job);
    }

    public function showValidJob(){
        $job=Job::paginate(12);

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=',"Valid")
        ->paginate(10);
        
        return view('admin/showJob')->with('job',$job);
    }

    public function searchJob(){
       
        $r=request();//retrive submited form data
        $keyword=$r->searchJob;

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.jobName', 'like', '%' . $keyword . '%')
        ->orWhere('jobs.position', 'like', '%' . $keyword . '%')
        ->orWhere('jobs.typeOfJob', 'like', '%' . $keyword . '%')
        ->orWhere('jobs.employeeType', 'like', '%' . $keyword . '%')
        ->where('jobs.status','=','Valid')
        ->paginate(10);
 
        return view('admin/showJob')->with('job',$job);
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

      
        return view('admin/showCompanyList')->with('companies',$companies);
    }

    public function showFullTime(){
        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=','Valid')
        ->where('jobs.typeOfJob','=',"Full-time")
        ->paginate(10);
        
        return view('admin/showJob')->with('job',$job);
    }

    public function showPartTime(){
        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=','Valid')
        ->where('jobs.typeOfJob','=',"Part-time")
        ->paginate(10);
        
        return view('admin/showJob')->with('job',$job);
    }

 

}
