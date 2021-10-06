<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        return view('admin/adminHome');
    }

    public function companyHome()
    {
        return view('company/companyHome');
    }

    public function teacherHome()
    {
        return view('teacher/teacherHome');
    }

    public function studentHome()
    {
        return view('student/studentHome');
    }

    public function alumniHome()
    {
        return view('alumniHome');
    }
}
