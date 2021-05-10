<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class Child extends Authenticatable
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];
    
    public static $rules = array (
      'name' => 'required',
      'password' => 'required',
      'birthday' => 'required',
      'basic_price' => 'required',
      'reward_price' => 'required'
    );
      
    public function help()
    {
        return $this->belongsToMany('App\Help')->using('App\ChildHelp');
    }
    
    public function set()
    {
        return $this->belongsTo('App\Set','set_base_year','base_year');
    }
    
    //申請中のお手伝いの検索
    public function getUnappliedHelps()
    {
        $applied_help_ids = DB::table('child_help')
                            ->where('child_id', '=', $this->id)
                            ->pluck('help_id')
                            ->all();
                            
        return DB::table('helps')
                ->whereNotIn('id', $applied_help_ids)
                ->select('id', 'help_day', 'help_content')
                ->get();
    }
    
    //お手伝いした日数の計算
    public function getHelpsCount($help_year, $help_month)
    {
        return DB::table('child_help')
                ->leftJoin('helps', 'child_help.help_id', '=', 'helps.id')
                ->where('child_id', '=', $this->id)
                ->where('approval_status', '=', 2)
                ->whereYear('help_day', '=', $help_year)
                ->whereMonth('help_day', '=', $help_month)
                ->count();
    }
    
    //お手伝い履歴の検索
    public function getHelpHistory()
    {
        return DB::table('child_help')
                ->leftJoin('helps', 'child_help.help_id', '=', 'helps.id')
                ->where('child_id', '=', $this->id)
                ->where('approval_status', '=', 2)
                ->whereDate('help_day', '<', date('Ymd'))
                ->select('help_day', 'help_content')
                ->get();
    }
}
