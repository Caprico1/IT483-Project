<?php

namespace App\Http\Controllers;

use App\Course;
use App\Faculty;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latest_news = DB::table('news')->limit(5)->get();
        $all_faculty = Faculty::all();

        $courses = Course::all();

        return view('home', compact('latest_news', 'all_faculty', 'courses'));

    }
}
