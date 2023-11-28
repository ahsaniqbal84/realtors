<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Office;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\EmployeeDesignation;

class EmployeesController extends Controller
{
    public function index(){
        $employees = Employee::join('employee_designations', 'employees.designation_id', '=', 'employee_designations.designation_id')
            ->leftJoin('teams', 'employees.team_id', '=', 'teams.team_id') 
            ->select('employees.*', 'employee_designations.name as designation_name','teams.name as team_name')
            ->orderByDesc('employees.employee_id')
            ->get();
        return inertia::render('Employees/Index',['employees'=>$employees]);
    }
    public function store(Request $request){
        // Validate the incoming request data
    $request->validate([
        // Add validation rules for other fields
        'first_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'code' => 'required',
        'office_id' => 'required|exists:offices,office_id',
        'team_id' => 'nullable|exists:teams,team_id',
        'department_id' => 'required|exists:departments,department_id',
        'designation_id' => 'required|exists:employee_designations,designation_id',
        'mobile_number' => 'required',
        'city' => 'required',
        'status' => 'required',
    ]);

    // Create a new employee
    $employee = new Employee([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'gender' => $request->input('gender'),
        'code' => $request->input('code'),
        'team_id' => $request->input('team_id'),
        'office_id' => $request->input('office_id'),
        'department_id' => $request->input('department_id'),
        'designation_id' => $request->input('designation_id'),
        'mobile_number' => $request->input('mobile_number'),
        'city' => $request->input('city'),
        'status' => $request->input('status'),
    ]);


    $employee->save();

    // You can add a success message or redirect to another page if needed

    return redirect()->route('employees.index');
    }
    public function create(){
        $offices = Office::all();
        $departments = Department::all();
        $designations = EmployeeDesignation::all();
        $teams = Team::all();

        return inertia::render('Employees/Create',[
            'offices' => $offices,
            'departments' => $departments,
            'designations' => $designations,
            'teams' => $teams,
        ]);
    }

    public function edit($id)
{
        $employee = Employee::where('employee_id', $id)->first();
        $offices = Office::all();
        $departments = Department::all();
        $designations = EmployeeDesignation::all();
        $teams = Team::all();


    return inertia('Employees/Edit', [
        'employee' => $employee,'offices' => $offices,
        'departments' => $departments,
        'designations' => $designations,
        'teams' => $teams,
    ]);
}

public function update(Request $request, $id)
{
    $employee = Employee::where('employee_id',$id)->first();

    $employee->update(
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'code' => 'required',
            'office_id' => 'required|exists:offices,office_id',
            'team_id' => 'nullable|exists:teams,team_id',
            'department_id' => 'required|exists:departments,department_id',
            'designation_id' => 'required|exists:employee_designations,designation_id',
            'mobile_number' => 'required',
            'city' => 'required',
            'status' => 'required',
        ])
    );

    return redirect()->route('employees.index');
}
}
