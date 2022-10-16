<?php

namespace App\Http\Controllers;

use App\Models\AccessLevel;
use Illuminate\Http\Request;

class AccessLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessLevels = AccessLevel::all();
        return response()->json($accessLevels);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accessLevel = AccessLevel::findOrFail($id);
        return response()->json($accessLevel);
    }
}
