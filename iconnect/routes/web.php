<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('company/home', [App\Http\Controllers\HomeController::class, 'companyHome'])->name('company.home')->middleware('is_company');

Route::get('teacher/home', [App\Http\Controllers\HomeController::class, 'teacherHome'])->name('teacher.home')->middleware('is_teacher');

Route::get('student/home', [App\Http\Controllers\HomeController::class, 'studentHome'])->name('student.home')->middleware('is_student');

Route::get('alumni/home', [App\Http\Controllers\HomeController::class, 'alumniHome'])->name('alumni.home')->middleware('is_alumni');

Route::get('student/insertProfile', [App\Http\Controllers\StudentController::class, 'insertProfile'])->name('insert.Profile');

Route::post('student/inserProfile/store', [App\Http\Controllers\StudentController::class, 'store'])->name('addStudentProfile');

Route::get('/showStudentProfile/{id}', [App\Http\Controllers\StudentController::class, 'show'])->name('showStudentProfile');

Route::get('/editStudentProfile/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('editStudentProfile');
