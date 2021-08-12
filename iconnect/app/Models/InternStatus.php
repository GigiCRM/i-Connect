<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternStatus extends Model
{
    use HasFactory;

    protected $fillable = [
      'studentId',
      'status',
      'email',
     ];

     public function user_student(){
        return $this->hasONe('App\User_student');
    }
}
