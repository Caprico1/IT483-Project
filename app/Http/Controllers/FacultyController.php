<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty = Faculty::all();

        return view('admin/faculty/index', compact('faculty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/faculty/create');
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
            'firstName' => 'required',
            'lastName' => 'required',
            'title' => 'required',
            'email' => 'required|email|unique:users',
            'office' => 'required',
            'phone' => 'required',
        ]);


        $path = $request->file('file')->getClientOriginalName();
        Storage::disk('public')->putFileAs('/', $request->file('file'), $path);

        $faculty = Faculty::create([
            'first_name' => $request->firstName,
            'last_name' =>  $request->lastName,
            'title' => $request->title,
            'email' => $request->email,
            'office' => $request->office,
            'phone' => $request->phone,
            'image_url' => $path
        ]);

        $faculty->save();

        return redirect()->route('faculty.index')->with('success', 'Successfully created Faculty member');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);

        return view('admin.faculty.edit', compact('faculty'));
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
        $faculty = Faculty::findOrFail($id);

        $faculty->first_name = $request->first_name;
        $faculty->last_name = $request->last_name;
        $faculty->title = $request->title;
        $faculty->email = $request->email;
        $faculty->office = $request->office;
        $faculty->phone = $request->phone;

        if ($request->file('file') != null){
            $new_path = $request->file('file')->getClientOriginalName();
            Storage::disk('public')->putFileAs('/', $request->file('file'), $new_path);
            $faculty->image_url = $new_path;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faculty::findOrFail($id)->delete();
    }
}
