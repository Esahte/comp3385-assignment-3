<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients/add');
    }

    public function create(ClientRequest $request)
    {
        $request->validated();

        $logoName = $request->file('logo')->storeAs('images', $request->file('logo')->getClientOriginalName(),
            'public');

        Client::create($request->only('name', 'email', 'phone', 'address') + ['company_logo' => $logoName]);

        return redirect('/dashboard')->with('success', "Client successfully created");
    }
}
