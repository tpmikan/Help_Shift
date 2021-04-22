<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ChildHelp extends Pivot
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
