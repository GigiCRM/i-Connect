<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
    use HasFactory;

    
    protected $fillable = [
      'jobId',
      'studentId',
      'status'
       ];


       public function job(){
        return $this->hasMany('App\Job');
    }

    public function student(){
        return $this->hasOne('App\Profile_student');
    }
}
