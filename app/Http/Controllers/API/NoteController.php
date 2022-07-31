<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;


class NoteController extends Controller
{
    
    public function getNoteByUser(Request $request)
    {
        $user_id = $request['id'];
        $note = Note::all()->where('id_user' , $user_id );
        return $note;
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addNote(Request $request)
    {
        
        $validator = Validator::make($request->all(),
        [
            'title' => 'required',
            'text' => 'required',
            'id_user' => 'required'
        ]
    );

    if($validator->fails()) {
        return response()->json(["status" => "failed", "message" => "Validation error", "errors" => $validator->errors()]);
    }
    else{

        $response["status"] = "successs";
        Note::create([
            'title' => $request['title'],
            'text' => $request['text'],
            'id_user' => $request['id_user'],
            'id_category' =>  1,
        ]);
        return response()->json($response);

    }

    }

    public function getAllNoteByUser(Request $request) 
    {   
        $user_id = $request['id'];
        $Note = Note::all()->where('id_user' , $user_id );   
        $Category = Category::all();
        return [$Category,$Note];
    }



    public function deleteNote(Request $request){

        $id_task = $request['id_task'];
        $Note = Note::find( $id_task );
        $Note->delete();
        return $Note;
    }

    public function updateNote(Request $request){

        $idNote= $request['id'];

        $Note = Note::find($idNote);
        $Note ->update(['text' => $request['text']]);
        $Note ->update(['title' => $request['title']]);
        return $Note;
    }
}
