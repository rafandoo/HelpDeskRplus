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
        $search = request('search');
        $filter = request('filter');

        if ($search) {
            $users = User::where($filter, 'like', '%' . $search . '%')
                ->where('access_level', '!=', 1)
                ->paginate(10);
        } else {
            $users = User::where('access_level', '!=', 1)
                ->paginate(10);
        }
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
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'access_level' => 'required',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->access_level = $request->access_level;
        $user->active = $request->active;
        $user->save();

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
    public function validateLogin($username)
    {
        $user = User::where('username', $username)->first();
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

        if ($request->picture) {
            $request->validate([
                'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('image'), $pictureName);
            $user->picture = $pictureName;
            $user->save();
        }

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
        ]);

        if ($request->password) {
            $request->validate([
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;

        $user->access_level = $request->access_level;
        $user->active = $request->active;
    
        $user->save();
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Usuário excluído com sucesso!');
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
        $user->active = !$user->active;
        $user->save();
        return redirect()->route('user.index')->with('success', 'Situação alterada com sucesso!');
    }

    /**
     * Display the profile of the user.
     * 
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    /**
     * Update the profile of the user.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->picture) {
            $request->validate([
                'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $pictureName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('image'), $pictureName);
            $user->picture = $pictureName;
            $user->save();
        }

        $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
        ]);

        if ($request->password) {
            $request->validate([
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ]);
            $user->password = bcrypt($request->password);
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;

        $user->save();
        return redirect()->route('user.profile', $user->id)->with('success', 'Perfil atualizado com sucesso!');
    }
}
