<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Album;
use App\Photo;
use Illuminate\Http\Request;

class GalleryController extends Controller
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
            $album = Album::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $album = Album::latest()->paginate($perPage);
        }

        return view('admin.gallery.index', compact('album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $album = Album::select()->get();

        return view('admin.gallery.create', compact('album'));
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
        $album = Album::firstOrNew(array('name' => $request->name));
        $album->save();

        return redirect('admin/gallery')->with('flash_message', 'Album added!');
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
        $album = Album::findOrFail($id);
        $photo=Photo::where('album_id',$album->id)->get();
        return view('admin.gallery.show', compact('album','photo'));
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
        $album = Album::findOrFail($id);
        return view('admin.gallery.edit', compact('album'));
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
        
        $album = Album::findOrFail($id);
        $album->name = $request['name'];
        $album->save();

        return redirect('admin/gallery')->with('flash_message', 'album updated!');
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
        Album::destroy($id);

        return redirect('admin/gallery')->with('flash_message', 'Album deleted!');
    }
    public function photocreate($id){

        $photo = Photo::select()->get();
        return view('admin.gallery.createphoto', compact('photo','id'));

    }

    public function photostore(Request $request){

        $this->validate(
            $request,
            [
                'name' => 'required',
                'url' => 'required'
            ]
        );

        $data = $request;

        $photo = Photo::firstOrNew(array('name' => $request->name));
        $file = $request->file('url');
        $extension = $file->getClientOriginalName();
        $filename=time().'.'.$extension;
        $file->move(public_path('uploads/image/gallery/'),$extension);
        $photo->url='uploads/image/gallery/'.$extension;
        $photo->album_id=$request->album_id;
        $photo->save();

        return redirect('admin/gallery/'.$photo->album_id)->with('flash_message', 'Photo Added!');


    }

    public function photodelete($id){

        Photo::destroy($id);
        return redirect()->back()->with('flash_message', 'Photo deleted!');

    }
}
