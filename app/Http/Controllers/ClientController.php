<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class ClientController extends Controller
{
    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('clients/add');
    }

    public function create(ClientRequest $request
    ): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application {
        $request->validated();

        $logoName = $request->file('logo')->storeAs('images', $request->file('logo')->getClientOriginalName(),
            'public');

        (new Client)->create($request->only('name', 'email', 'telephone', 'address') + ['company_logo' => $logoName]);

        return redirect('/dashboard')->with('success', "Client successfully created");
    }
}
