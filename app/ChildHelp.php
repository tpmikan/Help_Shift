<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildHelp extends Model
{
    //
    
    protected $table = 'child_help'; // tableを指定
    
    public function child()
    {
        return $this->belongsTo('App\Child');
    }
    
    public function help()
    {
        return $this->belongsTo('App\Help');
    }
}
