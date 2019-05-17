<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class HeaderController extends Controller
{
    public static function header()
    {
        echo view('partial.header',['header' => Slider::all(),'inc' => Slider::all()]);
    }
}
