<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Fileentry;

class FileController extends Controller
{
        /**
         * Display a listing of the resource.
         *
         * @return Response
         */
        public function index()
        {
                $entries = Fileentry::all();
 
                return view('fileentries.index', compact('entries'));
        }
 
        public function add() {
 
                $file = Request::file('filefield');
                $extension = $file->getClientOriginalExtension();
                Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
                $entry = new Fileentry();
                $entry->mime = $file->getClientMimeType();
                $entry->original_filename = $file->getClientOriginalName();
                $entry->filename = $file->getFilename().'.'.$extension;
 
                $entry->save();
 
                return redirect('fileentry');
                
        }
}