<?php

namespace App\Http\Controllers\Child;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChildController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:child');
    }
    
    public function index () 
    {
      return view('child.home');
    }
}
