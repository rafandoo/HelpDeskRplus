<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    
    /**
     * It checks if a user with the given login exists in the database
     * 
     * @param login The login of the user.
     * 
     * @return True or False
     */
    public function validateLogin($login)
    {
        $user = User::where('login', $login)->first();
        if ($user) {
            return response('True', 200);
        } else {
            return response('False', 200);
        }
    }

    /**
     * If the email exists in the database, return true, otherwise return false
     * 
     * @param email The email address to validate.
     * 
     * @return True or False
     */
    public function validateEmail($email)
    {
        $user = User::where('email', $email)->first();
        if ($user) {
            return response('True', 200);
        } else {
            return response('False', 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        /**
     * Change the status of the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $user = User::findOrFail($id);
        if ($user->active == 1) {
            $user->active = 0;
        } else {
            $user->active = 1;
        }
        $user->save();
        return redirect()->route('user.index')->with('success', 'Situação alterada com sucesso!');
    }
}
