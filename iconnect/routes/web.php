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

Route::get('/jobGallery', [App\Http\Controllers\StudentController::class, 'showJob'])->name('viewJob');

Route::post('student/internStatus/store', [App\Http\Controllers\InternStatusController::class, 'start'])->name('add.internStatus');

Route::get('student/internStatus', [App\Http\Controllers\InternStatusController::class, 'interStatusPage'])->name('insert.internStatus');

Route::get('/showInternStatus', [App\Http\Controllers\StudentController::class, 'showInternStatus'])->name('showInternStatus');

Route::get('student/applyJob/{id}', [App\Http\Controllers\StudentController::class, 'apply'])->name('applyJob');

Route::get('/student/showCompanyList', [App\Http\Controllers\StudentController::class, 'showCompanyList'])->name('student.showCompanyList');



//admin
Route::get('/insertJob', [App\Http\Controllers\JobController::class, 'insertJob'])->name('insertJob');

Route::post('admin/insertJob/store', [App\Http\Controllers\JobController::class, 'store'])->name('addJob');

Route::get('/showJob', [App\Http\Controllers\JobController::class, 'showJob'])->name('showJob');

Route::get('/approval/{id}', [App\Http\Controllers\AdminController::class, 'approval'])->name('job.approve');

Route::get('/showStudentList', [App\Http\Controllers\AdminController::class, 'studentList'])->name('showStudentList');

Route::get('/showStudentProfile/{id}', [App\Http\Controllers\AdminController::class, 'studentProfile'])->name('showStudent.Profile');

Route::get('/showStudentInternStatus', [App\Http\Controllers\AdminController::class, 'showInternStatus'])->name('showStudentInternStatus');

Route::get('/editStudentInternStatus/{id}', [App\Http\Controllers\InternStatusController::class, 'editStatus'])->name('editStudentInternStatus');

Route::post('/updateStudentInternStatus', [App\Http\Controllers\InternStatusController::class, 'updateStatus'])->name('updateStudentInternStatus');

Route::get('/insertEnrolSubject', [App\Http\Controllers\AdminController::class, 'insertEnrolmentSubject'])->name('insertEnrolmentSubject');

Route::post('admin/insertEnrolSubject/store', [App\Http\Controllers\AdminController::class, 'storeEnrolmentSubject'])->name('addEnrolSubject');

Route::get('/showEnrolmentSubjectList', [App\Http\Controllers\AdminController::class, 'showEnrolmentSubject'])->name('showEnrolmentSubject');

Route::get('/editEnrolmentSubjectList/{id}', [App\Http\Controllers\AdminController::class, 'editEnrolmentSubject'])->name('editEnrolmentSubject');

Route::post('/updateEnrolmentSubjectList', [App\Http\Controllers\AdminController::class, 'updateEnrolmentSubject'])->name('update.EnrolmentSubjectList');

Route::get('/deleteEnrolmentSubject/{id}', [App\Http\Controllers\AdminController::class, 'deleteEnrolmentSubject'])->name('delete.EnrolmentSubjectList');

Route::get('/editJob/{id}', [App\Http\Controllers\JobController::class, 'edit'])->name('editJob');

Route::post('/updateJob', [App\Http\Controllers\JobController::class, 'update'])->name('updateJob');

Route::get('/deleteJob/{id}', [App\Http\Controllers\JobController::class, 'delete'])->name('deleteJob');

Route::get('/admin/showCompanyProfile', [App\Http\Controllers\AdminController::class, 'showCompanyList'])->name('admin.showCompanyProfile');

Route::get('/admin/editCompanyProfile/{id}', [App\Http\Controllers\AdminController::class, 'editCompanyProfile'])->name('admin.editCompanyProfile');

Route::post('/admin/updateCompanyProfile', [App\Http\Controllers\AdminController::class, 'updateCompanyProfile'])->name('admin.updateCompanyProfile');

Route::get('/deleteCompanyProfile/{id}', [App\Http\Controllers\AdminController::class, 'deleteCompanyProfile'])->name('admin.deleteCompanyProfile');



//company
Route::get('/company/insertProfile', [App\Http\Controllers\CompanyController::class, 'insertProfile'])->name('insertCompanyProfile');

Route::post('company/insertProfile/store', [App\Http\Controllers\CompanyController::class, 'storeProfile'])->name('addCompanyProfile');

Route::get('/showCompanyProfile', [App\Http\Controllers\CompanyController::class, 'showProfile'])->name('showCompanyProfile');

Route::get('/editCompanyProfile/{id}', [App\Http\Controllers\CompanyController::class, 'editProfile'])->name('editCompanyProfile');

Route::post('/updateCompanyProfile', [App\Http\Controllers\CompanyController::class, 'updateProfile'])->name('updateCompanyProfile');

Route::get('/comapny/insertJob', [App\Http\Controllers\CompanyController::class, 'insertJob'])->name('company.insertJob');

Route::post('/company/insertJob/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.addJob');

Route::get('/company/showJob', [App\Http\Controllers\CompanyController::class, 'showJob'])->name('company.showJob');

Route::get('/company/editJob/{id}', [App\Http\Controllers\CompanyController::class, 'editJob'])->name('company.editJob');

Route::post('/company/updateJob', [App\Http\Controllers\CompanyController::class, 'updateJob'])->name('company.updateJob');

Route::get('/company/deleteJob/{id}', [App\Http\Controllers\CompanyController::class, 'deleteJob'])->name('company.deleteJob');

Route::get('/showAppliedJob', [App\Http\Controllers\CompanyController::class, 'showAppliedJob'])->name('showAppliedJob');

Route::get('/company/showCompanyList', [App\Http\Controllers\CompanyController::class, 'showCompanyList'])->name('company.showCompanyList');


