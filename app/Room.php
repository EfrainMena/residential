<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = ['id', 'room_number', 'floor', 'price', 'description', 'status', 'active', 'category_id'];
}
