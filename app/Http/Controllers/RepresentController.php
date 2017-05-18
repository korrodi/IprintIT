<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department;

class RepresentController extends Controller
{

    public function listUsers()
    {
        $title = 'List users';
        $users = User::orderBy('updated_at', 'desc')->paginate(15);

        return view('users.index', compact('title', 'users'));
    }
    public function listDepartments()
    {
        $title = 'List departments';

        /*nhody OrderBy numero de users*/
        //$departments = Department::paginate(15);
        $departments = Department::withCount('users')->get();

        return view('departments.index', compact('title', 'departments'));
    }
}
