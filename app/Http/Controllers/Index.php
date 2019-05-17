<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class Index extends Controller
{
    public static function index()
    {
        return view('welcome',['menu' => Menu::all()]);
    }
}
