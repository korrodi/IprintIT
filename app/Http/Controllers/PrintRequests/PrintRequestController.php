<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintRequestController extends Controller
{
    //
}


public function create()
{
    $today = Carbon::today();
    $today = $today->format('Y-d-m');
    

    return view('models.requests.add', compact('today'));
}

public function storeRequest(Request $request)
    {
        
        $req = new Request;
        $req->owner_id = Auth::user()->id;
        $req->description = $request->input('description');
        $req->quantity = $request->input('quantity');
        $req->colored = $request->input('colored');
        $req->stapled = $request->input('stapled');
        $req->paper_size = $request->input('paper_size');
        $req->paper_type = $request->input('paper_type');
        $req->file = $request->input('file');
        $req->due_date = $request->input('due_date');
        $req->save();


        if ($request->hasFile('file'))
        {
            //dd('Has photo');

            /*
            $table->increments('id');
            $table->integer('advertisement_id')->unsigned();
            $table->string('media_url')->nullable();
            $table->string('photo_path')->nullable();
            */

            $media = new Media;
            $media->advertisement_id = $req->id;
            $media->photo_path =  $req->id.'.'.$request->file('photo_ad')->getClientOriginalExtension();
            $media->save();

            $img = Image::make($request->file('photo_ad'));
            Storage::put('ad_pics/'.$req->id.'.'.$request->file('photo_ad')->getClientOriginalExtension(), $img->stream());
        }

        $request->session()->flash('status', 'Advertisement added With Sucess');
        return redirect('/dashboard');
    }