<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccessLevel  $accessLevel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
