<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;
use App\PrintRequest;

class ProfileController extends Controller
{
    public function showUser($id)
    {
        $title = 'Show user';
        $user = User::findOrFail($id);
                
        return view('users.show', compact('title', 'user'));
    }
    public function showDepartment($id)
    {
        $title = 'Show department';
        $department = Department::findOrFail($id);
                
        return view('departments.show', compact('title', 'department'));
    }
    public function showPrintRequest($id)
    {
        $title = 'Show Print Request';
        $printRequest = PrintRequest::findOrFail($id);
                
        return view('printRequest.show', compact('title', 'printRequest'));
    }

    public function showComments($id)
    {
        $title = 'Show Comments';
        $comment = Comment::findOrFail($id);
                
        return view('comments.show', compact('title', 'comment'));
    }
}
