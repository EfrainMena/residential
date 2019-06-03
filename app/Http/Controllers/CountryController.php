<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Validator;
use Illuminate\Validation\Rule;
use App\Country;
use App\State;

class CountryController extends Controller
{
    //vista principal
    public function index()
    {
        return view('countries.index');
    }
    //se envian los datos con formato hecho por yajra
    public function getData()
    {
        $countries = Country::all();
        //$countries = Country::select('name', 'nationality');
        return DataTables::of($countries)
            ->addColumn('action', function($country){
                return '<button class="btn btn-sm btn-outline-warning edit" id="'.$country->id.'"><i class="fas fa-edit"></i></button> 
                        <button class="btn btn-sm btn-outline-danger delete" id="'.$country->id.'"><i class="fas fa-trash"></i></button>
                        <a class="btn btn-sm btn-outline-success add_state" id="'.$country->id.'"><i class="fas fa-plus">Departamento</i></a>';
            })
            ->toJson();
    }
    //al enviar el formulario de nuevo pais
    public function postData(Request $request)
    {
        if($request->get('button_action') == 'insert')//es nuevo registro?
        {
            $validation = Validator::make($request->all(), [
                'name' => 'alpha_spaces|unique:countries',
                'nationality' => 'alpha_spaces|unique:countries',
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
                $country = new Country($request->all());
                $country->save();
                $success_output;
            }
        }
        elseif($request->get('button_action') == 'update') //se actualiza un pais?
        {
            $validation = Validator::make($request->all(), [
                'name' => ['alpha_spaces', Rule::unique('countries')->ignore($request->get('id'))],
                'nationality' => ['alpha_spaces', Rule::unique('countries')->ignore($request->get('id'))],
            ]);

            $error_array = array();
            $success_output = '';
            if($validation->fails())
            {
                foreach($validation->messages()->getMessages() as $messages)
                {
                    $error_array[] = $messages;
                }
            }
            else
            {
                $country = Country::find($request->get('id'));
                $country->name = $request->get('name');
                $country->nationality = $request->get('nationality');
                $country->update();
                $success_output;
            }
        }

        $output = array(
            'error'     => $error_array,
            'success'   => $success_output
        );
        echo json_encode($output);
    }
    //se recuperan datos pais
    public function fetchData(Request $request)
    {
        $id = $request->input('id');
        $country = Country::find($id);
        $output = array(
            'name' => $country->name,
            'nationality' => $country->nationality
        );
        echo json_encode($output);
    }
    //se recuperan datos de departamentos
    public function fetchDataForState(Request $request)
    {
        $id = $request->input('id');
        $country = Country::find($id);
        $output = array(
            'name' => $country->name,
        );
        echo json_encode($output);
    }
    //se envia el formulario de departamentos
    public function postDataForState(Request $request)
    {
        if($request->get('button_action_state') == 'insert')
        {
            $validation = Validator::make($request->all(), [
                'name' => 'alpha_spaces|unique:states',
                'country_id' => 'integer',
            ]);

            $error_array = array();
            $success_output = '';
            if($validation->fails())
            {
                foreach($validation->messages()->getMessages() as $messages)
                {
                    $error_array[] = $messages;
                }
            }
            else
            {
                $state = new State($request->all());
                $state->save();
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
