<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Team;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');
        if ($search) {
            $sectors = Sector::where([
                ['description', 'like', '%' . $search . '%']
            ])->paginate(10);
        } else {
            $sectors = Sector::paginate(10);
        }
        return view('sector.index', compact('sectors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sector = Sector::create($request->all());
        return redirect()->route('sector.edit', $sector->id)->with('success', 'Setor cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector = Sector::findOrFail($id);
        return view('sector.edit', ['sector' => $sector]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Sector::findOrFail($id)->update($request->all());
        return redirect()->route('sector.index')->with('success', 'Setor atualizado com sucesso!');
    }

    /**
     * Change the status of the specified resource from storage.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $sector = Sector::findOrFail($id);
        $sector->active = !$sector->active;
        $sector->save();
        return redirect()->route('sector.index')->with('success', 'Situação alterado com sucesso!');
    }

    /**
     * It gets all the teams that belong to a sector, then gets all the users that belong to those teams
     * 
     * @param id The id of the sector
     * 
     * @return users An array of users that belong to a specific sector.
     */
    public function users($id)
    {
        $teams = \App\Models\Team::where('sector_id', $id)->get();
        $users = [];
        foreach ($teams as $team) {
            $users = array_merge($users, \App\Models\User::where('id', $team->user_id)
                ->where('active', 1)
                ->get()
                ->toArray());
        }
        return response()->json($users);
    }


    /** 
     * Include a user and a sector in the team table
     * 
     * @param request The request object
     * 
     * @return \Illuminate\Http\Response
     */
    public function storeTeam(Request $request)
    {
        if (Team::create($request->all())) {
            return response()->json(['success' => true]);
        } 
        return response()->json(['success' => false]);
    }

    /**
     * > Delete a team from the database
     * 
     * @param sector_id The id of the sector you want to delete the team from.
     * @param user_id The id of the user you want to delete from the team.
     * 
     * @return a JSON response.
     */
    public function deleteTeam($sector_id, $user_id) 
    {
        if (Team::where('sector_id', $sector_id)->where('user_id', $user_id)->delete()) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }

/**
 * > This function updates the admin status of a user in a sector
 * 
 * @param Request request The request object
 * @param sector_id The id of the sector you want to update the team for.
 * @param user_id The user id of the user you want to update
 * 
 * @return A JSON response.
 */
    public function updateTeam(Request $request, $sector_id, $user_id)
    {
        if (Team::where('sector_id', $sector_id)->where('user_id', $user_id)->update(['admin' => $request->admin])) {
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false]);
    }
}
