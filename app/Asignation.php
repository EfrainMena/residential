<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignation extends Model
{
    //
    //protected $table = 'asignations';
    protected $fillable = ['id', 'date', 'hour', 'user_username', 'user_name', 'client_id', 'room_id'];
}
