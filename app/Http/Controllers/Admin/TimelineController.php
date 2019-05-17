<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Timeline;
use App\Timeline_post;
use Illuminate\Http\Request;

class TimelineController extends Controller
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
            $timeline = Timeline::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $timeline = Timeline::latest()->paginate($perPage);
        }

        return view('admin.timeline.index', compact('timeline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $timeline = Timeline::select()->get();

        return view('admin.timeline.create', compact('timeline'));
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
        $timeline = Timeline::firstOrNew(array('name' => $request->name));
        $timeline->save();

        return redirect('admin/timeline')->with('flash_message', 'Timeline added!');
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
        $timeline = Timeline::findOrFail($id);
        $timelinepost=Timeline_post::where('timeline_id',$timeline->id)->get();
        return view('admin.timeline.show', compact('timeline','timelinepost'));
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
        $timeline = Timeline::findOrFail($id);
        return view('admin.timeline.edit', compact('timeline'));
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
                'name' => 'required'
            ]
        );

        $data = $request;
        
        $timeline = Timeline::findOrFail($id);
        $timeline->name=$request->name;
        $timeline->save();

        return redirect('admin/timeline')->with('flash_message', 'Timeline updated!');
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
        Timeline::destroy($id);

        return redirect('admin/timeline')->with('flash_message', 'Timeline deleted!');
    }


    //Timeline post
    public function postedit($id)
    {
        $timelinepost = Timeline_post::findOrFail($id);
        return view('admin.timeline.post_edit', compact('timelinepost'));
    }

    public function updatepost(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'name' => 'required'
            ]
        );

        $data = $request;
        
        $timelinepost = Timeline_post::findOrFail($id);
        $timelinepost->name=$request->name;
        $timelinepost->desc=$request->desc;
        $timelinepost->label=$request->label;
        $timelinepost->year=$request->year;
        $timelinepost->desc=$request->desc;
        $timelinepost->label_isactive=$request->label_isactive;
        $timelinepost->save();

        return redirect('admin/timeline/'.$timelinepost->timeline_id)->with('flash_message', 'Timeline updated!');

    }

    public function postdelete($id)
    {
        Timeline_post::destroy($id);

        return redirect()->back()->with('flash_message', 'Timeline deleted!');
    }
 
    public function postcreate($id)
    {
        $timeline = Timeline_post::select()->get();

        return view('admin.timeline.createpost', compact('timelinepost','id'));
    }

    public function poststore(Request $request){


        $this->validate(
            $request,
            [
                'name' => 'required',
                'desc' => 'required',
                'year' => 'required',
                'label' => 'required',
            ]
        );

        $data = $request;

        $timelinepost = Timeline_post::firstOrNew(array('name' => $request->name));
        $timelinepost->name=$request->name;
        $timelinepost->desc=$request->desc;
        $timelinepost->year=$request->year;
        $timelinepost->label=$request->label;
        $timelinepost->label_isactive=$request->label_isactive;
        $timelinepost->timeline_id=$request->timeline_id;
        $timelinepost->save();

        return redirect('admin/timeline/'.$timelinepost->timeline_id)->with('flash_message', 'Timeline Added!');

    }
}
