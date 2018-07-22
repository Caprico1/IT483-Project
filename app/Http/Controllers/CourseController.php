<?php

namespace App\Http\Controllers;

use App\Course;
use App\PreRequisites;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('preRequisites')->get();

        return view('admin/courses/index', compact('courses'));


    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/courses/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'description' => 'required'
        ]);

        $course = Course::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description
        ]);

        foreach ($request->prerequisites as $prerequisite){
            $new_prerequisite = PreRequisites::create([
                'course_code' => $prerequisite
            ]);

            $new_prerequisite->course()->attach($course->id);
        }

        return redirect()->route('course.edit', $course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::with('preRequisites')->findOrFail($id);

        return view('admin/courses/show', compact($course));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrFail($id);

        $prerequisites = $course->preRequisites()->get();


        return view('admin/courses/edit', compact('course', 'prerequisites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'description' => 'required'
        ]);

        $course = Course::findOrFail($id);

        $course->name = $request->name;
        $course->code = $request->code;
        $course->description = $request->description;

        $course->save();
        $course->preRequisites()->detach();

        foreach ($request->prerequisites as $prerequisite){
            $new_prerequisite = PreRequisites::create([
                'course_code' => $prerequisite
            ]);

            $new_prerequisite->course()->attach($course->id);
        }

        return redirect()->back()->with('success', 'Successfully Updated Course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);

        $course->delete();

        return redirect()->back()->with('success', 'Successfully Deleted Course.');
    }
}
