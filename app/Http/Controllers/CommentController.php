<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }
}
