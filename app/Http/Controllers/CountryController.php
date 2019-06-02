<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Validator;
use Illuminate\Validation\Rule;
use App\Country;

class CountryController extends Controller
{
    //
    public function index()
    {
        return view('countries.index');
    }
    public function getData()
    {
        $countries = Country::all();
        //$countries = Country::select('name', 'nationality');
        return DataTables::of($countries)
            ->addColumn('action', function($country){
                return '<button class="btn btn-xs btn-outline-warning edit" id="'.$country->id.'"><i class="fas fa-edit"></i></button> <button class="btn btn-xs btn-outline-danger delete" id="'.$country->id.'"><i class="fas fa-trash"></i></button>';
            })
            ->toJson();
    }
    public function postData(Request $request)
    {
        if($request->get('button_action') == 'insert')
        {
            $validation = Validator::make($request->all(), [
                'name' => 'alpha_spaces|unique:countries',
                'nationality' => 'alpha_spaces|unique:countries',
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
                $country = new Country($request->all());
                $country->save();
                $success_output;
            }
        }
        elseif($request->get('button_action') == 'update')
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
}
