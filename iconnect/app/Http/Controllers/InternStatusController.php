<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile_student; 
use App\Models\User; 
use App\Models\Job; 
use App\Models\InternStatus;
use Illuminate\Support\Facades\Schema;


Use Auth;
Use Session;

class InternStatusController extends Controller
{
    public function interStatusPage()
    {
        $email=Auth::user()->email;
        $students=DB::table('profile_students')
        ->leftjoin('users','users.email','=','profile_students.Email')
        ->select('users.*','profile_students.*')
        ->where('users.email','=',$email)
        ->get();

        return view('student/internStatus')->with('students',$students);;
    }

    public function start(){    
        $r=request();
        $id=Auth::user()->id;
        $email=Auth::user()->email;
        $start=InternStatus::updateOrCreate([    
            'studentId'=>$id, 
            'email'=>$email, 
            'status'=>$r->status, 
            
        ]);
        Session::flash('success',"Intern Status changed.");
        Schema::dropIfExists('studentId');

        return redirect()->route('student.home');
    }

    public function showInternStatus(){
        $students =Profile_student::all();

        $id=Auth::user()->id;
        $internStatus=DB::table('intern_statuses')
        ->select('intern_statuses.status')
        ->where('intern_statuses.studentId','=',$id)
        ->get();

        return view('student/showStatus')->with('internStatus',$internStatus)
                                        ->with('students',$students);

    }

    public function editStatus($id){
        $internStatus =InternStatus::all()->where('id',$id);

        return view('admin/editStudentStatus')->with('internStatus',$internStatus);

    }

    public function updateStatus(){
        $r=request();
        $internStatus =InternStatus::find($r->id);
        $internStatus->status=$r->status;
        $internStatus->save();

        return redirect()->route('showStudentInternStatus');

    }

}
