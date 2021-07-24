<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@itsolutionstuff.com',
                'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@itsolutionstuff.com',
                'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'Company',
                'email'=>'company@itsolutionstuff.com',
                 'is_company'=>'1',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Teacher',
                'email'=>'teacher@itsolutionstuff.com',
                 'is_teacher'=>'1',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Student',
                'email'=>'student@itsolutionstuff.com',
                 'is_student'=>'1',
                'password'=> bcrypt('123456'),
             ],
             [
                'name'=>'Alumni',
                'email'=>'alumni@itsolutionstuff.com',
                 'is_alumni'=>'1',
                'password'=> bcrypt('123456'),
             ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
