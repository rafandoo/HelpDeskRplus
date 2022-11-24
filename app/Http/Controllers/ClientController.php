<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;

class ClientController extends Controller
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
            $clients = Client::where($filter, 'like', '%' . $search . '%')->paginate(10);
        } else {
            $clients = Client::paginate(10);
        }
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u = new User();
        $u->name = $request->name;
        $u->email = $request->email;
        $u->username = $request->username;
        $u->password = bcrypt($request->password);
        $u->access_level = 1;
        $u->save();

        $c = new Client();
        $c = $c->create($request->all());
        $c->user_id = $u->id;
        $c->save();

        $a = new Address();
        $a->client_id = $c->id;
        $a->zip_code = $request->zip_code;
        $a->street = $request->street;
        $a->number = $request->number;
        $a->neighborhood = $request->neighborhood;
        $a->complement = $request->complement;
        $a->city_id = $request->city_id;
        $a->save();
        return redirect()->route('client.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    /**
     * It checks if the CPF/CNPJ is already registered in the database
     * 
     * @param cpf_cnpj The CPF or CNPJ of the client.
     * 
     * @return True or False
    */
    public function validateCpfCnpj($cpf_cnpj)
    {
        $client = Client::where('cpf_cnpj', $cpf_cnpj)->first();
        if ($client) {
            return response('True', 200);
        } else {
            return response('False', 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $user = User::findOrFail($client->user_id);
        $address = Address::where('client_id', $client->id)->first();

        $user->update($request->all());
        $address->update($request->all());
        $client->update($request->all());
        return redirect()->route('client.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Change the status of the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function active($id)
    {
        $client = Client::findOrFail($id);
        if ($client->active == 1) {
            $client->active = 0;
        } else {
            $client->active = 1;
        }
        $client->save();
        return redirect()->route('client.index')->with('success', 'Situação atualizado com sucesso!');
    }

    /**
     * It takes a filter and a search term, and returns a JSON response of all the clients that match the
     * filter and search term
     * 
     * @param filter the column name to search
     * @param search the search term
     * 
     * @return A JSON object containing all the clients.
     */
    public function search($filter, $search)
    {
        if($search == 'all') {
            $clients = Client::all();
        } else {
            $clients = Client::where($filter, 'like', '%' . $search . '%')->get();
        }
        return response()->json($clients);
    }
}
