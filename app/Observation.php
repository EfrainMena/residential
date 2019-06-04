<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    //
    protected $fillable = ['id', 'date', 'description', 'client_id'];
}
