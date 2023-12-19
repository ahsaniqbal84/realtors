<?php

namespace App\Http\Controllers;

use App\Models\Zm;
use App\Models\Team;
use Inertia\Inertia;
use App\Models\Office;
use App\Models\Employee;
use App\Models\Department;

use Illuminate\Http\Request;
use App\Models\EmployeeDesignation;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters=$request->only(['name','code','status','designation','team','gender']);
        $designations = EmployeeDesignation::all();
        $teams = Team::all();

        $query = Employee::join('employee_designations', 'employees.designation_id', '=', 'employee_designations.designation_id')
            ->leftJoin('teams', 'employees.team_id', '=', 'teams.team_id') 
            ->select('employees.*', 'employee_designations.name as designation_name', 'teams.name as team_name')
            ->orderByDesc('employees.created_at');

        $this->applyFilters($query, $filters);
    
        return inertia::render('Employees/Index',[
            'employees'=>$query->paginate(8)
            ->withQueryString(),
            'designations'=>$designations,
            'teams'=>$teams,
            'filters'=>$filters,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $offices = Office::all();
        $departments = Department::all();
        $designations = EmployeeDesignation::all();
        $teams = Team::with('office')->get();
        $zms = Zm::leftJoin('employees as zm_employee', 'zm_employee.employee_id', '=', 'zms.employee_id')
        ->select(
            'zms.*',
            'zm_employee.first_name as zm_first_name',
            'zm_employee.last_name as zm_last_name'
        )
        ->get();

        return inertia::render('Employees/Create',[
            'offices' => $offices,
            'departments' => $departments,
            'designations' => $designations,
            'teams' => $teams,
            'zms' =>$zms,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateEmployeeData($request);
        Employee::create($validatedData);
    
        return redirect()->route('employee.index')->with('success','Employee is Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //$employee = Employee::where('employee_id', $id)->first();
        $offices = Office::all();
        $departments = Department::all();
        //$designations = EmployeeDesignation::query()->limit(EmployeeDesignation::count()-2)->get();
        $designations = EmployeeDesignation::all();
        $teams = Team::all();


    return inertia('Employees/Edit', [
        'employee' => $employee,'offices' => $offices,
        'departments' => $departments,
        'designations' => $designations,
        'teams' => $teams,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //$employee = Employee::where('employee_id', $id)->first();

        $validatedData = $this->validateEmployeeData($request);
    
        $employee->update($validatedData);
    
        return redirect()->route('employee.index')->with('success', 'Employee is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //$employee = Employee::find($id);
        $employee->status=0;
        $employee->save();
        return redirect()->route('employee.index')->with('success','Employee is deleted!');
    }

    protected function validateEmployeeData(Request $request)
    {
        return $request->validate([
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
    }

    protected function applyFilters($query, $filters)
    {
        return $query
        ->when(optional($filters)['name'], function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('first_name', $value)
                    ->orWhere('last_name', $value);
            });
        })
        ->when(optional($filters)['code'], function ($query, $value) {
            $query->where('code', $value);
        })
        ->when(optional($filters)['gender'], function ($query, $value) {
            $query->where('gender', $value);
        })
        ->when(isset($filters['status']), function ($query) use ($filters) {
            // If 'status' is present, use its value. Otherwise, skip the condition.
            $query->where('status', $filters['status']);
        })
        ->when(optional($filters)['designation'], function ($query, $value) {
            $query->where('employees.designation_id', $value);
        })
        ->when(optional($filters)['team'], function ($query) use ($filters) {
            $query->where(function ($query) use ($filters) {
                $query->when($filters['team'] == "none", function ($query) {
                    $query->whereNull('employees.team_id');
                }, function ($query) use ($filters) {
                    $query->where('employees.team_id', $filters['team']);
                });
            });
        });
    }
}
