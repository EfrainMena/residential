<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DataTables;
use App\Room;
use App\Category;

class RoomController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('rooms.index', compact('categories'));
    }

    public function getData()
    {
        $rooms = Room::all()->where('active', 1);
        $rooms->each(function($rooms){
            $rooms->category;
        });
        return DataTables::of($rooms)
            ->addColumn('action', function($room){
                return '<button class="btn btn-sm btn-outline-warning edit" id="'.$room->id.'"><i class="fas fa-edit"></i></button> 
                        <button class="btn btn-sm btn-outline-danger delete" id="'.$room->id.'"><i class="fas fa-trash"></i></button>';
            })
            ->toJson();
    }

    public function postData(Request $request)
    {
        if($request->get('button_action') == 'insert')//es nuevo registro?
        {
            $validation = Validator::make($request->all(), [
                'number' => 'numeric|unique:rooms',
                'level' => 'alpha_num',
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
                $room = new Room($request->all());
                $room->save();
                $success_output;
            }
        }
        elseif($request->get('button_action') == 'update') //se actualiza un pais?
        {
            $validation = Validator::make($request->all(), [
                'document' => ['string', Rule::unique('clients')->ignore($request->get('id'))],
                'name' => 'alpha_spaces',
                'surnames' => 'alpha_spaces',
                'birthdate' => 'required',
                'profession' => 'alpha_spaces',
                'civi_state' => 'alpha_spaces',
                'origin_country' => 'required|alpha_spaces',
                'origin_departament' => 'required|alpha_spaces',
                'nationality' => 'required',
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
                $client = Client::find($request->get('id'));
                    $client->document = $request->get('document');
                    $client->name = $request->get('name');
                    $client->surnames = $request->get('surnames');
                    $client->birthdate = $request->get('birthdate');
                    $client->profession = $request->get('profession');
                    $client->civil_state = $request->get('civil_state');
                    $client->origin_country = $request->get('origin_country');
                    $client->origin_departament = $request->get('origin_departament');
                    $client->nationality = $request->get('nationality');
                $client->update();
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
