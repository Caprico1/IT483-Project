<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_news = News::all();

        return view('admin.news.index', compact('all_news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Storage::disk('public')->putFileAs('/news', $request->file('file'), $request->file('file')->getClientOriginalName());

        $news_item = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'news_image' => $request->file('file')->getClientOriginalName()
        ]);

        return redirect()->route('news.index')->with('success', 'Successfully Created News Item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news_item = News::findOrFail($id);

        return view('admin.news.show', compact('news_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news_item = News::findOrFail($id);

        return view('admin.news.edit', compact('news_item'));
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
        $news_item = News::findOrFail($id);

        $news_item->title = $request->title;
        $news_item->content = $request->content;

        if ($request->file('file')){
            $news_item->news_image = $request->file('file')->getClientOriginalName();
            Storage::disk('public')->putFileAs('/news', $request->file('file'), $request->file('file')->getClientOriginalName());
        }

        return redirect()->back()->with('success', 'Successfully updated News post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Successfully Deleted News Item');
    }
}
