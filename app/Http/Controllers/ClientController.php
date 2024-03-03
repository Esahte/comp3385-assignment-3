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

        $logo = $request->file('logo');
        $logo->storeAs('images', $logo->getClientOriginalName(), 'public');

        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->telephone = $request->phone;
        $client->address = $request->address;
        $client->company_logo = $logo->getClientOriginalName();
        $client->save();
//        Client::create([
//            'name' => $request->name,
//            'email' => $request->email,
//            'telephone' => $request->phone,
//            'address' => $request->address,
//            'company_logo' => $logo->getClientOriginalName()
//        ]);

        return redirect('/dashboard')->with('success', "Client successfully created");
    }
}
