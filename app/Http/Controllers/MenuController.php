<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public static function menu()
    {
        echo view('partial.menu',['menu' => Menu::where('ismenu', 0)->get()]);
    }
}
