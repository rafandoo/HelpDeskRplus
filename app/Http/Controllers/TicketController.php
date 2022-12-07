<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priority_filter = request('priority_filter');
        $status_filter = request('status_filter');
        $category_filter = request('category_filter');
        $user_filter = request('user_filter');
        $client_filter = request('client_filter');
        $sector_filter = request('sector_filter');

        $tickets = Ticket::orderBy('id', 'desc')
            ->when($priority_filter, function ($query, $priority_filter) {
                return $query->where('priority_id', $priority_filter);
            })
            ->when($status_filter, function ($query, $status_filter) {
                return $query->where('status_id', $status_filter);
            })
            ->when($category_filter, function ($query, $category_filter) {
                return $query->where('category_id', $category_filter);
            })
            ->when($user_filter, function ($query, $user_filter) {
                return $query->where('user_id', $user_filter);
            })
            ->when($client_filter, function ($query, $client_filter) {
                return $query->where('client_id', $client_filter);
            })
            ->when($sector_filter, function ($query, $sector_filter) {
                return $query->where('sector_id', $sector_filter);
            })
            ->paginate(10);
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create($request->all());
        return redirect()->route('ticket.edit', $ticket->id)->with('success', 'Ticket cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
        return redirect()->route('ticket.index')->with('success', 'Ticket atualizado com sucesso!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function outstanding()
    {
        $tickets = Ticket::where('status_id', 1)->paginate(10);
        return view('ticket.outstanding', compact('tickets'));
    }

    /**
     * It returns a view of all tickets with a status of 2
     * 
     * @return A collection of tickets that have a status_id of 2.
     */
    public function pending()
    {
        $tickets = Ticket::where('status_id', 2)->paginate(10);
        return view('ticket.index', compact('tickets'));
    }

/**
 * It returns a view of all tickets with a status of 3.
 * 
 * @return A collection of tickets that have a status_id of 3.
 */
    public function inProgress()
    {
        $tickets = Ticket::where('status_id', 3)->paginate(10);
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('ticket.index')->with('success', 'Ticket excluído com sucesso!');
    }

    /**
     * It returns a JSON response of all occurrences that have the same ticket_id as the id passed to the
    * function
    * 
    * @param id The id of the ticket
    * 
    * @return An array of occurrences.
    */
    public function occurrences($id)
    {
        $occurrences = \App\Models\Occurrences::where('ticket_id', $id)->get()->toArray();
        return response()->json($occurrences);
    }
}
