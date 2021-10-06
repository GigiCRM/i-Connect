<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_student extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Gender',
        'StudentNo',
        'StudentID',
        'Batch_No',
        'Email',
        'Contact',
        'University',
        'FieldOfStudy',
        'Program',
        'GPA',
        'YearGraduate',
        'RelevantProject',
        'Result',
        'Image'
    ];

    public function user_student(){
        return $this->hasOne('App\User_studentController');
    }

    public function job(){
        return $this->hasOne('App\Job');
    }

    public function internDetail(){
        return $this->belongsTo('App\InternDetail');
    }



}
