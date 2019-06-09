<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Room;
use App\Category;
use App\Client;
use App\Asignation;

class AsignationController extends Controller
{
    //
    public function indexPb()
    {
        $rooms = Room::orderBy('number', 'ASC')->where('level', 'PB')->get();//;
        return view('asignations.index', compact('rooms'));
    }

    public function index1()
    {
        $rooms = Room::orderBy('number', 'ASC')->where('level', 1)->get();//;
        return view('asignations.index1', compact('rooms'));
    }

    public function index2()
    {
        $rooms = Room::orderBy('number', 'ASC')->where('level', 2)->get();//;
        return view('asignations.index2', compact('rooms'));
    }

    public function index3()
    {
        $rooms = Room::orderBy('number', 'ASC')->where('level', 3)->get();//;
        return view('asignations.index3', compact('rooms'));
    }

    //Autocomplete
    private $client = null;

    public function __construct()
    {
        $this->client = new Client();
    }
    public function findClient(Request $request)
    {
        return $this->client->findByDocument($request->input('q'));
    }

    public function postData(Request $request)
    {
        if($request->get('button_action_free') == 'insert')//es nuevo registro?
        {
            $validation = Validator::make($request->all(), [
                'date' => 'date',
                'hour' => 'required',
                'user_username' => 'required',
                'user_name' => 'required',
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
                $asignation = new Asignation($request->all());
                $asignation->save();
                $room = Room::find($request->get('room_id'));
                $room->status = 'Ocupado';
                $room->update();
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
