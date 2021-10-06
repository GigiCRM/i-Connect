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

class ReportController extends Controller
{
    public function week1(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>1, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week2(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>2, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week3(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>3, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week4(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>4, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week5(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>5, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week6(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>6, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week7(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>7, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week8(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>8, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week9(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>9, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week10(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>10, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week11(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>11, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week12(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>12, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function week13(){
        $r=request(); //step 3 get data from HTML

        $addReport=Report::updateOrCreate([    //step 3 bind data
            'week'=>13, //add on 
            'content'=>$r->content, //fullname from HTML
            'userId'=>Auth::user()->id,
           
        ]);
        Session::flash('success',"Report submitted!");

        return redirect()->route('student.insertReport');
    }

    public function storeReport(){
      
        return view('student/storeReport');
    }

    public function storeReport2(){
      
        return view('student/storeReport2');
    }

    public function storeReport3(){
      
        return view('student/storeReport3');
    }

    public function storeReport4(){
      
        return view('student/storeReport4');
    }
    public function storeReport5(){
      
        return view('student/storeReport5');
    }
    public function storeReport6(){
      
        return view('student/storeReport6');
    }
    public function storeReport7(){
      
        return view('student/storeReport7');
    }
    public function storeReport8(){
      
        return view('student/storeReport8');
    }
    public function storeReport9(){
      
        return view('student/storeReport9');
    }
    public function storeReport10(){
      
        return view('student/storeReport10');
    }
    public function storeReport11(){
      
        return view('student/storeReport11');
    }
    public function storeReport12(){
      
        return view('student/storeReport12');
    }
    public function storeReport13(){
      
        return view('student/storeReport13');
    }

    public function showReport(){
        $userId=Auth::user()->id;
        $reports =Report::all()->where('userId',$userId);
        //select * from products where id='$id'
        
        return view('student/showReport')->with('reports',$reports);
    }

    public function editReport($id){
        $reports =Report::all()->where('id',$id);
        
        return view('student/editReport')->with('reports',$reports);
                       
    }

    public function updateReport(){
        $r=request();//retrive submited form data
        $reports =Report::find($r->id);  //get the record based on product ID           
        $reports->content=$r->content;
        $reports->week=$r->week;
        $reports->save();

        return redirect()->route('student.showReport');
       }
}
