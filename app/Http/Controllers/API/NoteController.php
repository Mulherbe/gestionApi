<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Models\Category;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getNoteById(Request $request){
        $return  =  Note::all()->where('id_user', $request['id_user']);
        return   $return;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
    }
    public function getAllNoteByUser(Request $request) 
    {   
        $user_id = $request['id'];
        $Note = Note::all()->where('id_user' , $user_id );   
        $Category = Category::all();
        $toto = false;

        return [$Category,$Note];
    }
    
    // public function getAllNoteByCat(Request $request) 
    // {   
    //     $user_id = $request['id'];
    //     $Note = Note::all()->where('id_user' , $user_id );        
    //     return $Note ->map(function ($group) {
    //         $group->notes;
    //         return $group;
    //       });
    // }
}
