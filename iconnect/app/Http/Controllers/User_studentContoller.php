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

Use Auth;
Use Session;

class User_studentContoller extends Controller
{
    public function week1(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>1, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.home');
    }
}
