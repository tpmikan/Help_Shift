<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static $rules = array (
      'set_id' => 'required',
      'name' => 'required',
      'password' => 'required',
      'birthday' => 'required',
      'basic_price' => 'required',
      'reward_price' => 'required',
    );
      
    public function help()
    {
        return $this->belongsToMany('App\Help')->using('App\ChildHelp');
    }
    
    public function set()
    {
        return $this->belongsTo('App\Set','set_id','base_year');
    }
}
