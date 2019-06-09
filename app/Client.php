<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'clients';
    protected $fillable = ['id', 'document', 'name', 'surnames', 'birthdate', 'profession', 'civil_state', 'origin_country', 'origin_departament', 'nationality', 'active', 'user_id'];

    public function findByDocument($q)
    {
        return $this->where('document', 'LIKE', "%$q%")->get();
    }
}
