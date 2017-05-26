<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentController extends Controller
{
    public function listDepartments()
    {
        $title = 'List Departments';

        $departments = Department::paginate(5); 
        //dd($departments);
        return view('models.departments.index', compact('title', 'departments'));

    }
    public function showdepartment($id)
    {
        $department = Department::findOrFail($id);
        $title = 'Show department';
                
        return view('models.departments.show', compact('title', 'department'));
    }
}
