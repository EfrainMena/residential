<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['id', 'name', 'characteristics', 'regular_price', 'weekend_price', 'active'];

    public function rooms()
    {
    	return $this->hasMany(Room::class);
    }
}
