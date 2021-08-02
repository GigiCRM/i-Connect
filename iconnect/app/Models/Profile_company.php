<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_company extends Model
{
    use HasFactory;

    protected $fillable = [
       'companyId',
       'name',
       'type',
       'address',
       'image',
       'contact',
       'ssm'
    ];

    public function company(){
        return $this->hasOne('App\User');
    }
}
