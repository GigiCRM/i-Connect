<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Job; 
use App\Models\User; 
use App\Models\Profile_student; 
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
        $jobs->status =1;
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
}
