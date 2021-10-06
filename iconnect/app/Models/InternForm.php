<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'studentId',
        'studentName',
        'faculty',
        'program',
        'address',
        'contact',
        'companyName',
        'companyAddress',
        'jobType',
        'jobName',
        'position',
        'salary',
        'status',


    
       ];
}
