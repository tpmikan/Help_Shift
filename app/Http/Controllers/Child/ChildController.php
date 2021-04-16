<?php

namespace App\Http\Controllers\Child;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Help;
use App\Child;
use App\ChildHelp;
use Illuminate\Support\Facades\Auth;

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
    
    //お手伝いする
    public function showHelp()
    {
        $helps = Help::all();
        
        return view('child.help', compact("helps"));
    }
    
    public function help(Request $request)
    {
        $help = new ChildHelp;
        $child_id = Auth::id();
        $help_id = $request->id;
        
        $help->child_id = $child_id;
        $help->help_id = $help_id;
        $help->approval_status = 1;
        
        $help->save();
        
        return redirect('/help');
    }
}
