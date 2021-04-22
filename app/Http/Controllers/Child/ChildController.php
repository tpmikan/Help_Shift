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
        
        return view('child.request', compact("helps"));
    }
    
    public function help(Request $request)
    {
        $help = new ChildHelp;
        
        $help->child_id = Auth::id();
        $help->help_id = $request->id;
        $help->approval_status = 1;
        
        $help->save();
        
        return redirect('/help');
    }
    
    //お手伝いのキャンセル
    public function showCancel()
    {
        $child_helps = ChildHelp::all();
        $unapproveds = [];
        
        foreach($child_helps as $help){
            if($help->approval_status == 1){
                $unapproveds[] = $help;
            }
        }
        
        return view('child.cancel',compact("unapproveds"));
    }
    
    public function cancel(Request $request)
    {
        $help = ChildHelp::find($request->id);
        
        $help->delete();
        
        return redirect('/help/cancel');
    }
}
