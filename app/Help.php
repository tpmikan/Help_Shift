<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    //
    protected $fillable = ['help_day', 'help_content'];
    
    public function child()
    {
        return $this->belongsToMany('App\Child')->using('App\ChildHelp');
    }
}
