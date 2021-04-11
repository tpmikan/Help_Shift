<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Child;

class ParentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
      return view('parent.home');
    }
    
    public function children()
    {
        return view('parent.children');
    }
    
    public function add()
    {
        return view('parent.children_add');
    }
    
    protected function childrenAdd(Request $request)
    {
        $this->validate($request, Child::$rules);
        
        $child = new Child;
        $child->set_id = $request->input('set_id');
        $child->name = $request->input('name');
        $child->password = Hash::make($request->input('password'));
        $child->birthday = $request->input('birthday');
        $child->basic_price = $request->input('basic_price');
        $child->reward_price = $request->input('reward_price');
        
        $child->save();
        
        return redirect('/parent/children');
    }
}
