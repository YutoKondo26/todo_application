<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index()
    {
        return view('test');//viewはlaravelのヘルパ関数 ファイル名.ファイル名
    }
}
