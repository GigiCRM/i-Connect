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
            'type'=>$r->type,
            'address'=>$r->address,
            'contact'=>$r->contact,
            'ssm'=>$r->ssm,
            'image'=>$imageName,
            
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
            $profile->type=$r->type;
            $profile->address=$r->address;
            $profile->contact=$r->contact;
            $profile->ssm=$r->ssm;
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
        $jobs=Job::all()->where('publisherId',$publisherId);

        return view('company/showJob')->with('jobs',$jobs);
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

        $jobs=DB::table('applied_jobs')
        ->leftjoin('profile_students','profile_students.StudentNo','=','applied_jobs.studentId')
        ->leftjoin('jobs','jobs.id','=','applied_jobs.jobId')
        ->select('profile_students.Name as studentName','profile_students.Email as studentEmail','profile_students.Contact as studentContact','jobs.jobName as JobName','applied_jobs.*')
        ->where('applied_jobs.publisherId','=',$publisherId)
        ->get();

        return view('company/appliedList')->with('jobs',$jobs);
    }

    public function showCompanyList(){
        $company=Profile_company::paginate(12);
        
        return view('company/showCompanyList')->with('company',$company);
    }



    
}
