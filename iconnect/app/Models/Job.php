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

    public function user_student(){
      return $this->hasMany('App\User_student');
  }

  public function admin(){
    return $this->hasOne('App\AdminController');
}


}
