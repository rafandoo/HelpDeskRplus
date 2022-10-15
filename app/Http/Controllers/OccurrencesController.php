<?php

namespace App\Http\Controllers;

use App\Models\Occurrences;
use App\Models\Ticket;
use Illuminate\Http\Request;

class OccurrencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $ticket = Ticket::find($id);
        $occurrences = Occurrences::where('ticket_id', $id)->get();
        return view('occurrences.index', compact('occurrences'), compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $ticket = Ticket::find($id);
        return view('occurrences.create', compact('ticket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $occurrence = new Occurrences();
        $occurrence->created_at = $request->created_at;
        $occurrence->initial_time = $request->initial_time;
        $occurrence->final_time = $request->final_time;
        $occurrence->ticket_id = $request->ticket_id;
        $occurrence->description = $request->description;
        $occurrence->user_id = $request->user_id;
        $occurrence->save();

        $ticket = Ticket::find($request->ticket_id);
        $ticket->status_id = $request->status_id;
        $ticket->save();
        
        return redirect()->route('occurrences.index', $occurrence->ticket_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Occurrences  $occurrences
     * @return \Illuminate\Http\Response
     */
    public function show(Occurrences $occurrences)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Occurrences  $occurrences
     * @return \Illuminate\Http\Response
     */
    public function edit(Occurrences $occurrences)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Occurrences  $occurrences
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occurrences $occurrences)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Occurrences  $occurrences
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occurrences $occurrences)
    {
        //
    }
}
