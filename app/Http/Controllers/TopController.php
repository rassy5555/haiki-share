<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TopController extends Controller
{
    public function top(){
        return view('top');
    }
}
