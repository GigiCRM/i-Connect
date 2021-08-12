<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolment_subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'creatorId',
        'subjectName',
        'subjectCode',
        'lecturerId',
        'lecturerEmail',
        'faculty',
        'availableNo'
       ];
}
