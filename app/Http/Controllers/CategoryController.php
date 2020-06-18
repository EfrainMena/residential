<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;

class CategoryController extends Controller
{
    //

    public function postData(Request $request)
    {
        if($request->get('button_action_cat') == 'insert')//es nuevo registro?
        {
            $validation = Validator::make($request->all(), [
                'name' => 'string|unique:categories',
                'characteristics' => 'string|required',
                'regular_price' => 'numeric|required',
                'weekend_price' => 'numeric|required',
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
                $category = new Category($request->all());
                $category->save();
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



   

}
