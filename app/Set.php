<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    //
    protected $fillable = ['magnification'];
    
    public function child()
    {
        return $this->hasMany('App\Child');
    }
}
