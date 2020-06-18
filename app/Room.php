<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = ['id', 'number', 'level', 'active', 'category_id', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function clients()
    {
    	return $this->hasMany(Client::class);
    }
    public function asignations()
    {
        return $this->hasMany(Asignation::class,'id');
    }
}
