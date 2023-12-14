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
        $designations = EmployeeDesignation::query()->limit(EmployeeDesignation::count()-2)->get();
        $teams = Team::all();
        $query=Employee::join('employee_designations', 'employees.designation_id', '=', 'employee_designations.designation_id')
        ->leftJoin('teams', 'employees.team_id', '=', 'teams.team_id') 
        ->select('employees.*', 'employee_designations.name as designation_name','teams.name as team_name')
        ->orderByDesc('employees.created_at');
        if($filters['name']??null){
            $query->where('first_name',$filters['name'])
                ->orWhere('last_name',$filters['name']);
        }
        if($filters['code']??null){
            $query->where('code',$filters['code']);
        }if($filters['gender']??null){
            $query->where('gender',$filters['gender']);
        }
        if(isset($filters['status'])){
            $query->where('status','=',$filters['status']);
        }
        if($filters['designation']??null){
            $query->where('employees.designation_id',$filters['designation']);
        }if(isset($filters['team'])){
            if($filters['team']=="none"){
                $query->where('employees.team_id',null);
            }
            else{
            $query->where('employees.team_id',$filters['team']);
            }
        }

        $lastTwoDesignationIds = EmployeeDesignation::latest('designation_id')->limit(2)->pluck('designation_id');
        $query->whereNotIn('employees.designation_id', $lastTwoDesignationIds);
        $employees = 
            $query->paginate(8)
            ->withQueryString();
        return inertia::render('Employees/Index',[
            'employees'=>$employees,
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
        $designations = EmployeeDesignation::query()->limit(EmployeeDesignation::count()-2)->get();
        $teams = Team::all();
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
         // Validate the incoming request data
    dd($request->input('zm_id'));

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
    if($request->input('designation_id')==4){
        
    }
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
    public function edit(string $id)
    {
        $employee = Employee::where('employee_id', $id)->first();
        $offices = Office::all();
        $departments = Department::all();
        $designations = EmployeeDesignation::query()->limit(EmployeeDesignation::count()-2)->get();
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
    public function update(Request $request, string $id)
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

    return redirect()->route('employee.index')->with('success','Employee is updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->status=0;
        $employee->save();
        return redirect()->route('employee.index')->with('success','Employee is deleted!');
    }
}
