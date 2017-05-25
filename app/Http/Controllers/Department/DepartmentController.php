<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Department;

class DepartmentController extends Controller
{
    public function listDepartments()
    {
        $title = 'List departments';

        $departments = Department::all(); 
        $departments = Department::paginate(5);

        return view('departments.index', compact('title', 'departments'));

    }

}
;