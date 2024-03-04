<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $clients = Client::all();

        return view('dashboard', ['clients' => $clients]);
    }
}
