<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printer;

class PrinterController extends Controller
{
    public function listPrinters()
    {
        $title = 'List Printers';

        $printers = Printer::paginate(15); 
        //dd($printers);
        return view('models.printers.index', compact('title', 'printers'));

    }
    public function showPrinter($id)
    {
        $printer = Printer::findOrFail($id);
        $title = 'Show Printer';
                
        return view('models.printers.show', compact('title', 'printer'));
    }
}
