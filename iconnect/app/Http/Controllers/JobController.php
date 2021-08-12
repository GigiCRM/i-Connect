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


class JobController extends Controller
{
    public function insertJob()
    {
        return view('admin/insertJob');
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
            'status'=>"Valid",
            'image'=>$imageName,
            
        ]);
        Session::flash('success',"Job insert succesful!");

        return redirect()->route('admin.home');
    }

    public function showJob(){
        $jobs=Job::paginate(12);
        
        return view('admin/showJob')->with('jobs',$jobs);
    }

    public function edit($id){
        $jobs =Job::all()->where('id',$id);

        return view('admin/editJob')->with('jobs',$jobs);
    }

    public function update(){
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

        return redirect()->route('showJob');

    }

    public function delete($id){
        $jobs=Job::find($id);
        $jobs->delete();
        return redirect()->route('showJob');
    }

}
