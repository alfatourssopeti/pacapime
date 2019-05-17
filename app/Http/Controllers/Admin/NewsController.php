<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use App\News_Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $newscat = News_Category::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $newscat = News_Category::latest()->paginate($perPage);
        }

        return view('admin.newscat.index', compact('newscat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $newscat = News_Category::select()->get();

        return view('admin.newscat.create', compact('newscat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required'
            ]
        );

        $data = $request;
        $newscat = News_Category::firstOrNew(array('name' => $request->name));
        $newscat->save();

        return redirect('admin/newscat')->with('flash_message', 'News category added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $newscat = News_Category::findOrFail($id);
        $news=News::where('category_id',$newscat->id)->get();
        return view('admin.newscat.show', compact('newscat','news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
        $newscat = News_Category::findOrFail($id);
        return view('admin.newscat.edit', compact('newscat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int      $id
     *
     * @return void
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
            ]
        );

        $data = $request;
        
        $newscat = News_Category::findOrFail($id);
        $newscat->name = $request['name'];
        $newscat->save();

        return redirect('admin/newscat')->with('flash_message', 'News Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        News_Category::destroy($id);

        return redirect('admin/newscat')->with('flash_message', 'News Category deleted!');
    }

    public function newsedit($id){
        $news = News::findOrFail($id);
        return view('admin.newscat.newsedit', compact('news'));
    }

    public function updatenews(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'title' => 'required'
            ]
        );

        $data = $request;
        
        $news = News::findOrFail($id);
        $news->title=$request->title;
        $news->content=$request->content;
        $news->save();

        return redirect('admin/newscat/'.$news->category_id)->with('flash_message', 'News updated!');

    }

    public function newscreate($id){

        $news = News::select()->get();
        return view('admin.newscat.createnews', compact('news','id'));

    }

    public function newsstore(Request $request){

        $this->validate(
            $request,
            [
                'title' => 'required',
                'content' => 'required'
            ]
        );

        $data = $request;

        $news = news::firstOrNew(array('title' => $request->title));
        $news->content=$request->content;
        $news->category_id=$request->category_id;
        $news->save();

        return redirect('admin/newscat/'.$news->category_id)->with('flash_message', 'Photo Added!');


    }

    public function newsdelete($id){

        News::destroy($id);
        return redirect()->back()->with('flash_message', 'News deleted!');

    }

}
