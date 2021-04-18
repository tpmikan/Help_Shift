<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Child;
use App\Help;
use App\ChildHelp;
use Carbon\Carbon;

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
    
    //メンバー作成
    public function add()
    {
        return view('parent.children_add');
    }
    
    public function childrenAdd(Request $request)
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
    
    //お手伝い作成
    public function showHelpCreate()
    {
        return view('parent.help_create');
    }
    
    public function helpCreate(Request $request)
    {
        $help_content = $request->input('help_content');
        
        for($day = new Carbon($request->help_start); $day <= new Carbon($request->help_end); $day->addDay()){
            Help::create(["help_day"=>$day, "help_content"=>$help_content]);    
        }         
        
    
        
        return redirect('/parent/help/create');
    }
    
    //お手伝い削除
    public function showHelpDelete()
    {
        $helps = Help::all();
        
        return view('parent.help_delete', compact("helps"));
    }
    
    public function helpDelete(Request $request)
    {
        $help = Help::find($request->id);
        $help->delete();
        
        return redirect('/parent/help/delete');
    }
    
    //承認画面
    public function showApproval()
    {
        $child_helps = ChildHelp::all();
        $unapproveds = [];
        
        foreach($child_helps as $help){
            if($help->approval_status == 1){
                $unapproveds[] = $help;
            }
        }
        
        return view('parent.approval',compact("unapproveds", "day"));
    }
    
    public function approval(Request $request)
    {
        $approval = ChildHelp::find($request->id);
        
        $approval->approval_status = 2;
        $approval->save();
        
        return redirect('/parent/approval');
    }
    
    public function rejected(Request $request)
    {
        $rejected = ChildHelp::find($request->id);
        
        $rejected->delete();
        
        return redirect('/parent/approval');
    }
    
}
