<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintersController extends Controller
{
    public function index()
    {
        $printers = Printer::all();
        return view('printers.index', compact('printers'));
    }
}
