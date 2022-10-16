<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = Priority::all();
        return response()->json($priorities);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $priority = Priority::findOrFail($id);
        return response()->json($priority);
    }
}
