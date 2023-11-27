<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        $employees = Employee::join('employee_designations', 'employees.designation_id', '=', 'employee_designations.designation_id')
    ->select('employees.*', 'employee_designations.name as designation_name')
    ->get();

        return inertia::render('Employees/Index',['employees'=>$employees]);
    }
    public function store(){

    }
    public function create(){

    }
}
