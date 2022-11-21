<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ToDo = new ToDo();
        $ToDo->title = $request->title;
        $ToDo->completed = false;
        $ToDo->user_id = Auth::user()->id;
        $ToDo->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ToDo::find($id)->delete();
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ToDo  $toDo
     * @return \Illuminate\Http\Response
     */
    public function done($id)
    {
        $ToDo = ToDo::find($id);
        if ($ToDo->completed) {
            $ToDo->completed = false;
        } else {
            $ToDo->completed = true;
        }
        $ToDo->save();
        return redirect()->route('home');
    }
}
