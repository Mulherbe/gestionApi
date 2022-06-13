<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTodoByUser()
    {
        $todo = Todo::all();
        return $todo;
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTodo(Request $request)
    {
        
        $validator = Validator::make($request->all(),
        [
            'title' => 'required',
            'id_user' => 'required',
            'id_category' => 'required'
        ]
    );

    if($validator->fails()) {
        return response()->json(["status" => "failed", "message" => "Validation error", "errors" => $validator->errors()]);
    }
    else{

        $response["status"] = "successs";
        Todo::create([
            'title' => $request['title'],
            'state' => 0,
            'id_user' => $request['id_user'],
            'id_category' =>  $request['id_category'],
        ]);
        return response()->json($response);

    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
    }

    public function getAllTodoByUser(Request $request) 
    {   
        $user_id = $request['id'];
        $Note = Todo::all()->where('id_user' , $user_id );   
        $Category = Category::all();
        $toto = false;

        return [$Category,$Note];
    }
}
