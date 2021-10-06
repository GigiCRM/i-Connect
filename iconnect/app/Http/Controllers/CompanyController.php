<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job; 
use App\Models\User; 
use App\Models\Profile_student; 
use App\Models\InternStatus; 
use App\Models\Enrolment_subject;
use App\Models\AppliedJob; 
use App\Models\Profile_company;
Use Auth;
Use Session;

class CompanyController extends Controller
{
    public function insertProfile(){
        return view('company/insertProfile');
    }

    public function storeProfile(){
        $r=request(); 
        $companyId=Auth::user()->id;

        $image=$r->file('image');   
        $image->move('img',$image->getClientOriginalName());                 
        $imageName=$image->getClientOriginalName(); 

        $addProfile=Profile_company::updateOrCreate([   
            'companyId'=>$companyId,  
            'name'=>$r->name,
            'founder'=>$r->founder,
            'type'=>$r->type,
            'address'=>$r->address,
            'contact'=>$r->contact,
            'ssm'=>$r->ssm,
            'image'=>$imageName,
            'establish'=>$r->establish,
            'URL'=>$r->URL,

            
        ]);

        return redirect()->route('company.home');
    }

    public function showProfile(){
        $user=Auth::user()->id;
        $profile=Profile_company::all()->where('companyId',$user);

        return view('company/companyProfile')->with('profile',$profile);
    }

    public function editProfile($id){
        $profile =Profile_company::all()->where('id',$id);

        return view('company/editCompanyProfile')->with('profile',$profile);
    }

    public function updateProfile(){
        $r=request();
        $profile =Profile_company::find($r->id);
        if($r->file('image')!=''){
            $image=$r->file('image');        
            $image->move('img',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $profile->image=$imageName;
            }     
            $profile->name=$r->name;
            $profile->founder=$r->founder;
            $profile->type=$r->type;
            $profile->address=$r->address;
            $profile->contact=$r->contact;
            $profile->ssm=$r->ssm;
            $profile->establish=$r->establish;
            $profile->URL=$r->URL;
            $profile->save(); 
            return redirect()->route('showCompanyProfile');

    }

    
    public function insertJob()
    {
        return view('company/insertJob');
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

        return redirect()->route('company.showJob');
    }

    public function showJob(){
        $publisherId=Auth::user()->id;
        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('publisherId',$publisherId)
        ->paginate(10);
        return view('company/jobListing')->with('job',$job);
    }

    public function showValidJob(){
        $job=Job::paginate(12);

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=',"Valid")
        ->paginate(10);
        
        return view('company/showJob')->with('job',$job);
    }

    public function editJob($id){
        $jobs =Job::all()->where('id',$id);

        return view('company/editJob')->with('jobs',$jobs);
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

        return redirect()->route('company.showJob');

    }

    public function deleteJob($id){
        $jobs=Job::find($id);
        $jobs->delete();
        return redirect()->route('company.showJob');
    }

    public function showAppliedJob(){
        $publisherId=Auth::user()->id;

        $job=DB::table('applied_jobs')
        ->leftjoin('profile_students','profile_students.StudentNo','=','applied_jobs.studentId')
        ->leftjoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->select('profile_students.Name as studentName','profile_students.Email as studentEmail','profile_students.Contact as studentContact','jobs.jobName as JobName','applied_jobs.*')
        ->where('applied_jobs.publisherId','=',$publisherId)->orderBy('jobId','asc')
        ->paginate(10);

        return view('company/appliedList')->with('job',$job);
    }

    public function showApprovedJob(){
        $publisherId=Auth::user()->id;

        $job=DB::table('applied_jobs')
        ->leftjoin('profile_students','profile_students.StudentNo','=','applied_jobs.studentId')
        ->leftjoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->select('profile_students.Name as studentName','profile_students.Email as studentEmail','profile_students.Contact as studentContact','jobs.jobName as JobName','applied_jobs.*')
        ->where('applied_jobs.publisherId','=',$publisherId)
        ->where('applied_jobs.status','=','Approved')
        ->paginate(10);

        return view('company/appliedList')->with('job',$job);
    }

    public function showPendingJob(){
        $publisherId=Auth::user()->id;

        $job=DB::table('applied_jobs')
        ->leftjoin('profile_students','profile_students.StudentNo','=','applied_jobs.studentId')
        ->leftjoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->select('profile_students.Name as studentName','profile_students.Email as studentEmail','profile_students.Contact as studentContact','jobs.jobName as JobName','applied_jobs.*')
        ->where('applied_jobs.publisherId','=',$publisherId)
        ->where('applied_jobs.status','=','Pending')
        ->paginate(10);

        return view('company/appliedList')->with('job',$job);
    }

    public function showDeclineJob(){
        $publisherId=Auth::user()->id;

        $job=DB::table('applied_jobs')
        ->leftjoin('profile_students','profile_students.StudentNo','=','applied_jobs.studentId')
        ->leftjoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->select('profile_students.Name as studentName','profile_students.Email as studentEmail','profile_students.Contact as studentContact','jobs.jobName as JobName','applied_jobs.*')
        ->where('applied_jobs.publisherId','=',$publisherId)
        ->where('applied_jobs.status','=','Decline')
        ->paginate(10);

        return view('company/appliedList')->with('job',$job);
    }

    public function showCompanyList(){
        $companies=Profile_company::paginate(12);
        
        return view('company/showCompanyList')->with('companies',$companies);
    }

    public function approval($id){
        $jobs =AppliedJob::all()->where('id',$id);
        $r=request();
        $jobs = AppliedJob::find($r->id);
        $jobs->status ="Approved";
        $jobs->save();

         return redirect()->route('company.showApprovedJob')->with('jobs',$jobs);
    }

    public function decline($id){
        $jobs =AppliedJob::all()->where('id',$id);
        $r=request();
        $jobs = AppliedJob::find($r->id);
        $jobs->status ="Decline";
        $jobs->save();

         return redirect()->route('company.showDeclineJob')->with('jobs',$jobs);
    }

    public function showFullTime(){

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=','Valid')
        ->where('jobs.typeOfJob','=',"Full-time")
        ->paginate(10);
        
        return view('company/showJob')->with('job',$job);
    }

    public function showPartTime(){

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.status','=','Valid')
        ->where('jobs.typeOfJob','=',"Part-time")
        ->paginate(10);
        
        return view('company/showJob')->with('job',$job);
    }

    public function showEmployeeList(){
        $publisherId=Auth::user()->id;

        $employee=DB::table('applied_jobs')
        ->leftjoin('profile_students','profile_students.StudentNo','=','applied_jobs.studentId')
        ->leftjoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->select('applied_jobs.*','profile_students.*','jobs.*')
        ->where('applied_jobs.publisherId','=','Valid')
        ->where('jobs.typeOfJob','=',$publisherId)
        ->paginate(10);
        
        return view('company/showEmployeeList')->with('employee',$employee);
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
 
        return view('company/showJob')->with('job',$job);
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

      
        return view('company/showCompanyList')->with('companies',$companies);
    }

    public function searchStudent(){
        $r=request();//retrive submited form data
        $keyword=$r->searchJob;
        $job=DB::table('profile_students')
        ->where('profile_students.Name', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.StudentID', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.University', 'like', '%' . $keyword . '%')
        ->orWhere('profile_students.Email', 'like', '%' . $keyword . '%')
        ->paginate(6);

      
        return view('company/showCompanyList')->with('job',$job);
    }

    public function searchJobList(){
       
        $publisherId=Auth::user()->id;

        $job=DB::table('jobs')
        ->select('jobs.*')
        ->where('jobs.publisherId','=',$publisherId)->where(function($query){  
            $r=request();//retrive submited form data
            $keyword=$r->searchJob;

            $query->orWhere('jobs.jobName', 'like', '%' . $keyword . '%')
            ->orWhere('jobs.position', 'like', '%' . $keyword . '%')
            ->orWhere('jobs.typeOfJob', 'like', '%' . $keyword . '%')
            ->orWhere('jobs.employeeType', 'like', '%' . $keyword . '%')
            ->where('jobs.status','=','Valid');
        }) ->paginate(10);

        return view('company/jobListing')->with('job',$job);
    }


    
}
