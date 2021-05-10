<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    //
    protected $fillable = ['help_day', 'help_content'];
    
    public static $rules = array (
      'help_content' => 'required',
      'help_start' => 'required',
      'help_end' => 'required'
    );
    
    public function child()
    {
        return $this->belongsToMany('App\Child')->using('App\ChildHelp');
    }
}
