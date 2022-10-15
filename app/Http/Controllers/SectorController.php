<?php

namespace App\Http\Controllers;

use App\Models\Sector;

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
        $sectors = Sector::all();
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
        Sector::create($request->all());
        return redirect()->route('sector.index')->with('success', 'Setor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector = Sector::findOrFail($id);
        return view('sector.show', ['sector' => $sector]);
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
        if ($sector->active == 1) {
            $sector->active = 0;
        } else {
            $sector->active = 1;
        }
        $sector->save();
        return redirect()->route('sector.index')->with('success', 'Situação alterado com sucesso!');
    }

    /**
     * It gets all the teams that belong to a sector, then gets all the users that belong to those teams
     * 
     * @param id The id of the sector
     * 
     * @return An array of users that belong to a specific sector.
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
}
