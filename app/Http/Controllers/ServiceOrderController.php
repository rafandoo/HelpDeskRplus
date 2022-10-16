<?php

namespace App\Http\Controllers;

use App\Models\serviceOrder;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function direct($ticket_id)
    {
        if (serviceOrder::where('ticket_id', $ticket_id)->exists()) {
            $serviceOrder = serviceOrder::where('ticket_id', $ticket_id)->first();
            return view('serviceOrder.edit', compact('serviceOrder'));
        } else {
            $serviceOrder = new serviceOrder();
            $serviceOrder->ticket_id = $ticket_id;
            return view('serviceOrder.create', compact('serviceOrder'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ServiceOrder::create($request->all());
        return redirect()->route('ticket.edit', $request->ticket_id)->with('success', 'Ordem de serviço cadastrada com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\serviceOrder  $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serviceOrder = serviceOrder::findOrFail($id);
        $serviceOrder->update($request->all());
        return redirect()->route('ticket.edit', $request->ticket_id)->with('success', 'Ordem de serviço atualizada com sucesso!');
    }
}
