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

Route::get('alumni/home', [App\Http\Controllers\AlumniController::class, 'studentProfile'])->name('alumni.home')->middleware('is_alumni');


//alumni
Route::get('alumni/insertProfile', [App\Http\Controllers\AlumniController::class, 'insertProfile'])->name('alumni.insert.Profile');

Route::post('alumni/inserProfile/store', [App\Http\Controllers\AlumniController::class, 'store'])->name('alumni.addStudentProfile');

Route::get('/alumni/showStudentProfile', [App\Http\Controllers\AlumniController::class, 'show'])->name('alumni.showStudentProfile');

Route::get('/alumni/editStudentProfile/{id}', [App\Http\Controllers\AlumniController::class, 'edit'])->name('alumni.editStudentProfile');

Route::post('/alumni/updateStudentProfile', [App\Http\Controllers\AlumniController::class, 'update'])->name('alumni.updateStudentProfile');

Route::get('/alumni/jobGallery', [App\Http\Controllers\AlumniController::class, 'showJob'])->name('alumni.viewJob');

Route::get('alumni/applyJob/{id}', [App\Http\Controllers\AlumniController::class, 'apply'])->name('alumni.applyJob');

Route::get('/alumni/showCompanyList', [App\Http\Controllers\AlumniController::class, 'showCompanyList'])->name('alumni.showCompanyList');

Route::get('/alumni/showAppliedJobList', [App\Http\Controllers\AlumniController::class, 'showAppliedJob'])->name('alumni.showAppliedJob');

Route::get('/alumni/showApprovedJobList', [App\Http\Controllers\AlumniController::class, 'showApprovedJob'])->name('alumni.showApprovedJob');

Route::get('alumni/acceptJobRequest/{id}', [App\Http\Controllers\AlumniController::class, 'InterDetail'])->name('alumni.acceptJobRequest');

Route::get('alumni/declineJobRequest/{id}', [App\Http\Controllers\AlumniController::class, 'declineJobRequet'])->name('alumni.declineJobRequet');

Route::post('alumni/searchJob', [App\Http\Controllers\AlumniController::class, 'searchJob'])->name('alumni.searchJob');

Route::post('alumni/searchCompany', [App\Http\Controllers\AlumniController::class, 'searchCompany'])->name('alumni.searchCompany');


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

Route::get('/student/showAppliedJobList', [App\Http\Controllers\StudentController::class, 'showAppliedJob'])->name('student.showAppliedJob');

Route::get('/student/showApprovedJobList', [App\Http\Controllers\StudentController::class, 'showApprovedJob'])->name('student.showApprovedJob');

Route::get('student/acceptJobRequest/{id}', [App\Http\Controllers\StudentController::class, 'InterDetail'])->name('acceptJobRequest');

Route::get('/showInternDetail', [App\Http\Controllers\StudentController::class, 'showInternDetail'])->name('showInternDetail');

Route::get('/declineJobRequest/{id}', [App\Http\Controllers\StudentController::class, 'declineJobRequet'])->name('declineJobRequet');

Route::get('/student/showEnrolmentSubject', [App\Http\Controllers\StudentController::class, 'showSubject'])->name('student.showSubject');

Route::get('student/enrollSubject/{id}', [App\Http\Controllers\StudentController::class, 'enrollSubject'])->name('student.enrollSubject');

Route::get('student/showEnrolSubject', [App\Http\Controllers\StudentController::class, 'showEnrolSubject'])->name('student.showEnrolSubject');

Route::get('student/showClassroomPost/{id}', [App\Http\Controllers\StudentController::class, 'showClassroomPost'])->name('student.showClassroomPost');

Route::get('student/insertReport', [App\Http\Controllers\StudentController::class, 'insertReport'])->name('student.insertReport');

Route::get('student/showReport', [App\Http\Controllers\ReportController::class, 'showReport'])->name('student.showReport');

Route::get('/editReport/{id}', [App\Http\Controllers\ReportController::class, 'editReport'])->name('student.editReport');

Route::post('/updateReport', [App\Http\Controllers\ReportController::class, 'updateReport'])->name('student.updateReport');

Route::get('student/insertInternForm', [App\Http\Controllers\StudentController::class, 'insertInternForm'])->name('student.insertInternForm');

Route::post('student/storeInternForm/store', [App\Http\Controllers\StudentController::class, 'storeInternForm'])->name('storeInternForm');

Route::get('student/showInternForm', [App\Http\Controllers\StudentController::class, 'showInternForm'])->name('student.showInternForm');

Route::get('/editInternForm/{id}', [App\Http\Controllers\StudentController::class, 'editInternForm'])->name('student.editInternForm');

Route::post('/updateInternForm', [App\Http\Controllers\StudentController::class, 'updateInternForm'])->name('student.updateInternForm');

Route::post('student/searchJob', [App\Http\Controllers\StudentController::class, 'searchJob'])->name('student.searchJob');

Route::post('student/searchSubjectList', [App\Http\Controllers\StudentController::class, 'searchSubjectList'])->name('student.searchSubjectList');

Route::post('/student/searchCompany', [App\Http\Controllers\StudentController::class, 'searchCompany'])->name('student.searchCompany');

//weekly Report
Route::post('student/storeWeeklyLog/1', [App\Http\Controllers\ReportController::class, 'week1'])->name('student.storeReport.week1');
Route::post('student/storeWeeklyLog/2', [App\Http\Controllers\ReportController::class, 'week2'])->name('student.storeReport.week2');
Route::post('student/storeWeeklyLog/3', [App\Http\Controllers\ReportController::class, 'week3'])->name('student.storeReport.week3');
Route::post('student/storeWeeklyLog/4', [App\Http\Controllers\ReportController::class, 'week4'])->name('student.storeReport.week4');
Route::post('student/storeWeeklyLog/5', [App\Http\Controllers\ReportController::class, 'week5'])->name('student.storeReport.week5');
Route::post('student/storeWeeklyLog/6', [App\Http\Controllers\ReportController::class, 'week6'])->name('student.storeReport.week6');
Route::post('student/storeWeeklyLog/7', [App\Http\Controllers\ReportController::class, 'week7'])->name('student.storeReport.week7');
Route::post('student/storeWeeklyLog/8', [App\Http\Controllers\ReportController::class, 'week8'])->name('student.storeReport.week8');
Route::post('student/storeWeeklyLog/9', [App\Http\Controllers\ReportController::class, 'week9'])->name('student.storeReport.week9');
Route::post('student/storeWeeklyLog/10', [App\Http\Controllers\ReportController::class, 'week10'])->name('student.storeReport.week10');
Route::post('student/storeWeeklyLog/11', [App\Http\Controllers\ReportController::class, 'week11'])->name('student.storeReport.week11');
Route::post('student/storeWeeklyLog/12', [App\Http\Controllers\ReportController::class, 'week12'])->name('student.storeReport.week12');
Route::post('student/storeWeeklyLog/13', [App\Http\Controllers\ReportController::class, 'week13'])->name('student.storeReport.week13');

//return to insert report page
Route::get('student/insertReport/store', [App\Http\Controllers\ReportController::class, 'storeReport'])->name('student.storeReport');
Route::get('student/insertReport/store/2', [App\Http\Controllers\ReportController::class, 'storeReport2'])->name('student.storeReport2');
Route::get('student/insertReport/store/3', [App\Http\Controllers\ReportController::class, 'storeReport3'])->name('student.storeReport3');
Route::get('student/insertReport/store/4', [App\Http\Controllers\ReportController::class, 'storeReport4'])->name('student.storeReport4');
Route::get('student/insertReport/store/5', [App\Http\Controllers\ReportController::class, 'storeReport5'])->name('student.storeReport5');
Route::get('student/insertReport/store/6', [App\Http\Controllers\ReportController::class, 'storeReport6'])->name('student.storeReport6');
Route::get('student/insertReport/store/7', [App\Http\Controllers\ReportController::class, 'storeReport7'])->name('student.storeReport7');
Route::get('student/insertReport/store/8', [App\Http\Controllers\ReportController::class, 'storeReport8'])->name('student.storeReport8');
Route::get('student/insertReport/store/9', [App\Http\Controllers\ReportController::class, 'storeReport9'])->name('student.storeReport9');
Route::get('student/insertReport/store/10', [App\Http\Controllers\ReportController::class, 'storeReport10'])->name('student.storeReport10');
Route::get('student/insertReport/store/11', [App\Http\Controllers\ReportController::class, 'storeReport11'])->name('student.storeReport11');
Route::get('student/insertReport/store/12', [App\Http\Controllers\ReportController::class, 'storeReport12'])->name('student.storeReport12');
Route::get('student/insertReport/store/13', [App\Http\Controllers\ReportController::class, 'storeReport13'])->name('student.storeReport13');



//admin
Route::get('/insertJob', [App\Http\Controllers\JobController::class, 'insertJob'])->name('insertJob');

Route::post('admin/insertJob/store', [App\Http\Controllers\JobController::class, 'store'])->name('addJob');

Route::get('/showJob', [App\Http\Controllers\JobController::class, 'showJob'])->name('showJob');

Route::get('/showInvalidJob', [App\Http\Controllers\AdminController::class, 'showInvalidJob'])->name('showInvalidJob');

Route::get('/showValidJob', [App\Http\Controllers\AdminController::class, 'showValidJob'])->name('showValidJob');

Route::get('/approval/{id}', [App\Http\Controllers\AdminController::class, 'approval'])->name('job.approve');

Route::get('/decline/{id}', [App\Http\Controllers\AdminController::class, 'decline'])->name('job.decline');

Route::get('/showStudentList', [App\Http\Controllers\AdminController::class, 'studentList'])->name('showStudentList');

Route::get('/showAlumniList', [App\Http\Controllers\AdminController::class, 'showAlumniList'])->name('showAlumniList');

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

Route::post('/admin/searchStudent', [App\Http\Controllers\AdminController::class, 'searchStudent'])->name('admin.searchStudent');

Route::post('/admin/searchInternStatus', [App\Http\Controllers\AdminController::class, 'searchInternStatus'])->name('admin.searchInternStatus');

Route::post('/admin/searchAlumni', [App\Http\Controllers\AdminController::class, 'searchAlumni'])->name('admin.searchAlumni');

Route::post('/admin/searchSubject', [App\Http\Controllers\AdminController::class, 'searchSubject'])->name('admin.searchSubject');

Route::post('/admin/searchJob', [App\Http\Controllers\AdminController::class, 'searchJob'])->name('admin.searchJob');

Route::post('/admin/searchCompany', [App\Http\Controllers\AdminController::class, 'searchCompany'])->name('admin.searchCompany');

Route::get('/showFullTime', [App\Http\Controllers\AdminController::class, 'showFullTime'])->name('showFullTime');

Route::get('/showPartTime', [App\Http\Controllers\AdminController::class, 'showPartTime'])->name('showPartTime');


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

Route::get('/company/showApprovedJob', [App\Http\Controllers\CompanyController::class, 'showApprovedJob'])->name('company.showApprovedJob');

Route::get('/company/showPendingJob', [App\Http\Controllers\CompanyController::class, 'showPendingJob'])->name('company.showPendingJob');

Route::get('/company/showDeclineJob', [App\Http\Controllers\CompanyController::class, 'showDeclineJob'])->name('company.showDeclineJob');

Route::get('/company/showCompanyList', [App\Http\Controllers\CompanyController::class, 'showCompanyList'])->name('company.showCompanyList');

Route::get('/company/approveAppliedList/{id}', [App\Http\Controllers\CompanyController::class, 'approval'])->name('company.approve');

Route::get('/company/declineAppliedList/{id}', [App\Http\Controllers\CompanyController::class, 'decline'])->name('company.decline');

Route::get('/company/showFullTime', [App\Http\Controllers\CompanyController::class, 'showFullTime'])->name('company.showFullTime');

Route::get('/company/showPartTime', [App\Http\Controllers\CompanyController::class, 'showPartTime'])->name('company.showPartTime');

Route::get('/company/showValidJob', [App\Http\Controllers\CompanyController::class, 'showValidJob'])->name('company.showValidJob');

Route::get('/company/showEmployeeList', [App\Http\Controllers\CompanyController::class, 'showEmployeeList'])->name('company.showEmployeeList');

Route::post('/company/searchJob', [App\Http\Controllers\CompanyController::class, 'searchJob'])->name('company.searchJob');

Route::post('/company/searchCompany', [App\Http\Controllers\CompanyController::class, 'searchCompany'])->name('company.searchCompany');

Route::post('/company/searchStudent', [App\Http\Controllers\CompanyController::class, 'searchStudent'])->name('company.searchStudent');

Route::post('/company/searchJobList', [App\Http\Controllers\CompanyController::class, 'searchJobList'])->name('company.searchJobList');

//Teacher
Route::get('/teacher/insertProfile', [App\Http\Controllers\TeacherController::class, 'insertProfile'])->name('teacher.insertProfile');

Route::post('teacher/insertProfile/store', [App\Http\Controllers\TeacherController::class, 'storeProfile'])->name('teacher.storeProfile');

Route::get('/showTeacherProfile', [App\Http\Controllers\TeacherController::class, 'showProfile'])->name('showTeacherProfile');

Route::get('/editTeacherProfile/{id}', [App\Http\Controllers\TeacherController::class, 'editProfile'])->name('editTeacherProfile');

Route::post('/updateTeacherProfile', [App\Http\Controllers\TeacherController::class, 'updateProfile'])->name('updateTeacherProfile');

Route::get('/teacher/insertJob', [App\Http\Controllers\TeacherController::class, 'insertJob'])->name('teacher.insertJob');

Route::post('/teacher/insertJob/store', [App\Http\Controllers\TeacherController::class, 'store'])->name('teacher.addJob');

Route::get('/teacher/showJob', [App\Http\Controllers\TeacherController::class, 'showJob'])->name('teacher.showJob');

Route::get('/teacher/editJob/{id}', [App\Http\Controllers\TeacherController::class, 'editJob'])->name('teacher.editJob');

Route::post('/teacher/updateJob', [App\Http\Controllers\TeacherController::class, 'updateJob'])->name('teacher.updateJob');

Route::get('/teacher/deleteJob/{id}', [App\Http\Controllers\TeacherController::class, 'deleteJob'])->name('teacher.deleteJob');

Route::get('/teacher/showCompanyList', [App\Http\Controllers\TeacherController::class, 'showCompanyList'])->name('teacher.showCompanyList');

Route::get('/teacher/showSubjectList', [App\Http\Controllers\TeacherController::class, 'showSubjectList'])->name('teacher.showSubjectList');

Route::get('/teacher/showStudentList/{id}', [App\Http\Controllers\TeacherController::class, 'showStudentList'])->name('teacher.showStudentList');

Route::get('/teacher/showClassroom', [App\Http\Controllers\TeacherController::class, 'showClassroom'])->name('teacher.showClassroom');

Route::get('/teacher/addClassroom/{id}', [App\Http\Controllers\TeacherController::class, 'addClassroom'])->name('teacher.addClassroom');

Route::get('/teacher/insertPost/{id}', [App\Http\Controllers\TeacherController::class, 'getSubjectId'])->name('teacher.insertPost');

Route::post('/teacher/storePost/store', [App\Http\Controllers\TeacherController::class, 'storePost'])->name('teacher.storePost');

Route::get('/teacher/showPost/{subjectId}', [App\Http\Controllers\TeacherController::class, 'showPost'])->name('teacher.showPost');

Route::get('/teacher/viewReport/{studentId}', [App\Http\Controllers\TeacherController::class, 'viewReport'])->name('teacher.viewReport');

Route::get('/teacher/viewInternForm/{studentId}', [App\Http\Controllers\TeacherController::class, 'viewInternForm'])->name('teacher.viewInternForm');

Route::get('/teacher/approveInternForm/{id}', [App\Http\Controllers\TeacherController::class, 'approveInternForm'])->name('teacher.approveInternForm');

Route::get('/teacher/rejectInternForm/{id}', [App\Http\Controllers\TeacherController::class, 'rejectInternForm'])->name('teacher.rejectInternForm');

Route::get('/teacher/showValidJob', [App\Http\Controllers\TeacherController::class, 'showValidJob'])->name('teacher.showValidJob');

Route::get('/teacher/showFullTime', [App\Http\Controllers\TeacherController::class, 'showFullTime'])->name('teacher.showFullTime');

Route::get('/teacher/showPartTime', [App\Http\Controllers\TeacherController::class, 'showPartTime'])->name('teacher.showPartTime');

Route::post('/teacher/searchSubjectList', [App\Http\Controllers\TeacherController::class, 'searchSubjectList'])->name('teacher.searchSubjectList');

Route::post('/teacher/searchJob', [App\Http\Controllers\TeacherController::class, 'searchJob'])->name('teacher.searchJob');

Route::post('/teacher/searchJobList', [App\Http\Controllers\TeacherController::class, 'searchJobRecord'])->name('teacher.searchJobList');

Route::post('/teacher/searchCompany', [App\Http\Controllers\TeacherController::class, 'searchCompany'])->name('teacher.searchCompany');

Route::get('/teacher/deletePost/{id}', [App\Http\Controllers\TeacherController::class, 'deletePost'])->name('teacher.deletePost');

Route::get('/teacher/editPost/{id}', [App\Http\Controllers\TeacherController::class, 'editPost'])->name('teacher.editPost');

Route::post('/teacher/updatePost', [App\Http\Controllers\TeacherController::class, 'updatePost'])->name('teacher.updatePost');


//send Message
Route::get('/sendMessage/{studentId}', [App\Http\Controllers\MessageController::class, 'insertMessage'])->name('insertMessage');

Route::post('/storeMessage', [App\Http\Controllers\MessageController::class, 'storeMessage'])->name('storeMessage');

Route::get('/showMessage', [App\Http\Controllers\MessageController::class, 'showMessage'])->name('showMessage');

Route::get('/createMessage/{id}', [App\Http\Controllers\MessageController::class, 'createMessage'])->name('createMessage');

Route::get('/student/showMessage', [App\Http\Controllers\MessageController::class, 'showStudentMessage'])->name('showStudentMessage');


