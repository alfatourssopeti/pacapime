<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
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
            $menu = Menu::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $menu = Menu::latest()->paginate($perPage);
        }

        return view('admin.menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $menu = Menu::select()->get();

        return view('admin.menu.create', compact('menu'));
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
                'name' => 'required',
                'desc' => 'required',
                'url' => 'required',
                'image' => 'required|max:2048'
            ]
        );

        $data = $request;
        $menu = Menu::firstOrNew(array('name' => $request->name));
        $menu->desc = $request->desc;
        $menu->url = $request->url;
        $menu->ismenu = $request->ismenu;
        $file = $request->file('image');
        $extension = $file->getClientOriginalName();
        $filename=time().'.'.$extension;
        $file->move(public_path('uploads/image/'),$extension);
        $menu->image='uploads/image/'.$extension;
        
        $menu->save();

        return redirect('admin/menu')->with('flash_message', 'Menu added!');
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
        $menu = Menu::findOrFail($id);

        return view('admin.menu.show', compact('menu'));
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
        $menu = Menu::findOrFail($id);
        return view('admin.menu.edit', compact('menu'));
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
                'desc' => 'required',
                'url' => 'required',
                'image' => 'required|max:2048'
            ]
        );

        $data = $request;
        
        $menu = Menu::findOrFail($id);
        $menu->name = $request['name'];
        $menu->desc = $request['desc'];
        $menu->url = $request['url'];
        $menu->ismenu = $request['ismenu'];
        $file = $request->file('image');
        $extension = $file->getClientOriginalName();
        $filename=time().'.'.$extension;
        $file->move(public_path('uploads/image/'),$extension);
        $menu->image='uploads/image/'.$extension;
        

        $menu->save();

        return redirect('admin/menu')->with('flash_message', 'menu updated!');
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
        Menu::destroy($id);

        return redirect('admin/menu')->with('flash_message', 'Menu deleted!');
    }
}
