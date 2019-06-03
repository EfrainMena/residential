<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use DataTables;
use Validator;
use App\Client;
use App\Country;
use App\State;

class ClientController extends Controller
{
    //index y envio de datos de paises
    public function index()
    {
        $countries = Country::all();
        return view('clients.index', compact('countries'));
    }

    //llenado de las tablas con datos de los clientes
    public function getData()
    {
        $clients = Client::all();
        return DataTables::of($clients)
            ->addColumn('action', function($clients){
                return '<button class="btn btn-sm btn-outline-warning edit" id="'.$clients->id.'"><i class="fas fa-edit"></i></button> 
                <button class="btn btn-sm btn-outline-danger delete" id="'.$clients->id.'"><i class="fas fa-trash"></i></button>
                <a class="btn btn-sm btn-outline-purple add_obs" id="'.$clients->id.'"><i class="fas fa-plus">Observacion</i></a>';
            })
            ->toJson();
    }

    //obtener lista de departamentos segun eleccion de pais
    public function getDepartaments(Request $request)
    {
        if($request->ajax())
        {
            $departaments = State::where('country_id', $request->country_id)->get();
            foreach($departaments as $departament)
            {
                $departamentArray[$departament->id] = $departament->name;
            }
            return response()->json($departamentArray);
        }
    }
    //llena campo de Nacionalidad
    public function getCountry(Request $request)
    {
        if ($request->ajax()) {
            $countries = Country::where('id', $request->country_id)->get();
            foreach($countries as $country){
                $countryArray[$country->id] = $country->name;
            }
            return response()->json($countryArray);
        }
    }
    
    public function postData(Request $request)
    {
        if($request->get('button_action') == 'insert')//es nuevo registro?
        {
            $validation = Validator::make($request->all(), [
                'document' => 'string|unique:clients',
                'name' => 'alpha_spaces',
                'surnames' => 'alpha_spaces',
                'birthdate' => 'required',
                'profession' => 'alpha_spaces',
                'civi_state' => 'alpha_spaces',
                'origin_country' => 'required|alpha_spaces',
                'origin_departament' => 'required|alpha_spaces',
                'nationality' => 'required',
                'user_id' => 'integer',
            ]);

            $error_array = array();
            $success_output = '';
            if($validation->fails()) //no pasa la validacion?
            {
                foreach($validation->messages()->getMessages() as $messages)
                {
                    $error_array[] = $messages;
                }
            }
            else
            {
                $client = new Client($request->all());
                $client->save();
                $success_output;
            }
        }

        $output = array(
            'error'     => $error_array,
            'success'   => $success_output
        );
        echo json_encode($output);
    }
}
