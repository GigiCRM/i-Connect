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
       'founder',
       'type',
       'address',
       'image',
       'contact',
       'ssm',
       'establish',
       'URL'
       
    ];

    public function company(){
        return $this->hasOne('App\User');
    }
}
