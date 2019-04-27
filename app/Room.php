<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = ['id', 'nhab','tipoh','precioh'];

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
