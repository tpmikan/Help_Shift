<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Child;
use App\Help;
use App\ChildHelp;
use App\Set;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:parent');
        dd(Auth::user());
    }
    
    public function index() 
    {
        //学年を計算
        $children = Child::all();
        foreach($children as $child){
            $child->set_base_year = parent::gradeCalculation($child->birthday);
            $child->save();
        }
        
        return view('parent.home');
    }
    
    //メンバー管理
    public function children()
    {
        $children = Child::all();
        
        return view('parent.children', compact("children"));
    }
    
    public function add()
    {
        
        return view('parent.children_add');
    }
    
    public function childrenAdd(Request $request)
    {
        $this->validate($request, Child::$rules);
        
        $child = new Child;
        $child->name = $request->input('name');
        $child->password = Hash::make($request->input('password'));
        $child->birthday = $request->input('birthday');
        $child->basic_price = $request->input('basic_price');
        $child->reward_price = $request->input('reward_price');
        $child->set_base_year = parent::gradeCalculation($child->birthday);
        
        $child->save();
        
        return redirect('/parent/children');
    }
    
    public function showMemberEdit(Request $request)
    {
        $child = Child::find($request->id);
        
        return view('parent.member_edit',compact("child"));
    }
    
    public function memberEdit(Request $request)
    {
        $child = Child::find($request->id);
        
        $child->basic_price = $request->basic_price;
        $child->reward_price = $request->reward_price;
        
        $child->save();
        
        return redirect('/parent/children');
    }
    
    public function memberDelete(Request $request)
    {
        $child = Child::find($request->id);
        
        $child->delete();
        
        return redirect('/parent/children');
    }
    
    //お手伝い作成
    public function showHelpCreate()
    {
        return view('parent.help_create');
    }
    
    public function helpCreate(Request $request)
    {
        $this->validate($request, Help::$rules);
        
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
        
        return view('parent.approval',compact("unapproveds"));
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
    
    //お小遣い　計算
    public function showCalculation()
    {
        $children = Child::all();
        
        return view('parent.calculation', compact("children"));
    }
    
    public function calculation(Request $request)
    {
        $help_year = date('Y', strtotime($request->input('help_month')));
        $help_month = date('m', strtotime($request->input('help_month')));
        
        $child = Child::find($request->input('child_name'));
        $helps_count = $child->getHelpsCount($help_year, $help_month);//お手伝い日数の計算
        
        $total_price = ($child->basic_price * $child->set->magnification) + ($child->reward_price * $child->set->magnification * $helps_count);//お小遣いの合計金額
        
        return view('parent.help_money', compact("child", "helps_count", "total_price"));
    }
    
    //設定
    public function showSet()
    {
        $sets = Set::all();
        
        return view('parent.set', compact("sets"));
    }
    
    public function set(Request $request)
    {
        $set = Set::find($request->id);
        
        $set->magnification = $request->magnification;
        $set->save();
        
        return redirect('/parent/set');
    }
    
}
