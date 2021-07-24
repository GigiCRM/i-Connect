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

}
