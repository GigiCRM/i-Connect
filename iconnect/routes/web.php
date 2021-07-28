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

Route::get('alumni/home', [App\Http\Controllers\HomeController::class, 'alumniHome'])->name('alumni.home')->middleware('is_alumni');

//student

Route::get('student/home', [App\Http\Controllers\StudentController::class, 'studentProfile'])->name('student.home')->middleware('is_student');

Route::get('student/insertProfile', [App\Http\Controllers\StudentController::class, 'insertProfile'])->name('insert.Profile');

Route::post('student/inserProfile/store', [App\Http\Controllers\StudentController::class, 'store'])->name('addStudentProfile');

Route::get('/showStudentProfile', [App\Http\Controllers\StudentController::class, 'show'])->name('showStudentProfile');

Route::get('/editStudentProfile/{id}', [App\Http\Controllers\StudentController::class, 'edit'])->name('editStudentProfile');

Route::post('/updateStudentProfile', [App\Http\Controllers\StudentController::class, 'update'])->name('updateStudentProfile');

Route::get('/showStudentResume', [App\Http\Controllers\StudentController::class, 'showResume'])->name('showStudentResume');


//admin
Route::get('admin/insertJob', [App\Http\Controllers\AdminController::class, 'insertJob'])->name('insertJob');

Route::post('admin/insertJob/store', [App\Http\Controllers\AdminController::class, 'store'])->name('addJob');

Route::get('/showJob', [App\Http\Controllers\AdminController::class, 'showJob'])->name('showJob');
