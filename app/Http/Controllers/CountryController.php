<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Validator;
use Illuminate\Validation\Rule;

class CountryController extends Controller
{
    //
    public function index()
    {
        return view('countries.index');
    }
}
