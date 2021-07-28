<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
      'publisherId',
      'jobName',
      'position',
      'salary',
      'qualification',
      'location',
      'workingHour',
      'typeOfJob',
      'description',
      'employeeType',
      'image',
      'status'
    ];

}
