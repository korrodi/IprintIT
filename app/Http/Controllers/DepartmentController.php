<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    public function listDepartments()
    {
        $title = 'List departments';
        $departments = Department::paginate(5);

        return view('departments.index', compact('title', 'departments'));
    }
}
