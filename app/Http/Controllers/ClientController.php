<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index()
    {
        return view('clients/add');
    }

    public function create(ClientRequest $request)
    {
        $request->validated();

        return redirect('/dashboard')->with('success', "Client successfully created");
    }
}
