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
use App\Models\Message;

Use Auth;
Use Session;

class MessageController extends Controller
{
    //

    public function insertMessage($studentId){
        $students =Enrolment_student::all()->where('studentId',$studentId);
        $r=request();
        $studentsId =Enrolment_student::find($r->id); 

        $addMessage=Message::updateOrCreate([    
            'receiverId'=>$studentId, 
            'content'=>$r->content, 
            'senderId'=>Auth::user()->id,
          
        ]);

        return redirect()->route('teacher.home');
    }

   public function showMessage(){
        $sender=Auth::user()->id;

        $message=DB::table('messages')
        ->select('messages.*')
        ->where('messages.senderId','=',$sender)
        ->get();

        return view('teacher/MessageList')->with('message',$message);
   }

   public function createMessage($id){
        $message =Message::all()->where('id',$id);

        return view('teacher/sendMessage')->with('message',$message);
   }

   public function storeMessage(){
    $r=request();
    $message =Message::find($r->id); 
    $message->receiverId=$r->receiverId;
    $message->senderId=$r->senderId;
    $message->content=$r->content;
    $message->save();

    return redirect()->route('showMessage');
   }

   public function showStudentMessage(){
    $studentId=Auth::user()->id;

    $message=DB::table('messages')
    ->select('messages.*')
    ->where('messages.receiverId','=',$studentId)
    
    ->get();

    return view('student/showMessage')->with('message',$message);
   }
}
