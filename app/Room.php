<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = ['id', 'number', 'level', 'active', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
