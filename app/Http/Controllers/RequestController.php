<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function index()
    {
        $requests = Request::all();
        return view('requests.index', compact('requests'));
    }
}
