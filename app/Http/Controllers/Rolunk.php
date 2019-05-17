<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timeline;
use App\Timeline_post;
class Rolunk extends Controller
{
    public function index(){
        $timeline = Timeline::select()->get();
        $timelinepost = Timeline_post::select()->get();
        return view('rolunk', compact('timeline','timelinepost'));
    }
}
