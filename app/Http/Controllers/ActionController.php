<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Room;

class ActionController extends Controller
{
    //
    function maintenance(Request $request)
    {
        Room::find($request->input('id'))->update(['status' => 'Mantenimiento']);
    }
	function limpiando(Request $request)
    {
        Room::find($request->input('id'))->update(['status' => 'Limpiando']);
    }
    function finishMaint(Request $request)
    {
        Room::find($request->input('id'))->update(['status' => 'Libre']);
    }
}
