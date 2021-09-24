<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HommeController extends Controller
{
    public function index(){
        return view('home');
    }
}
