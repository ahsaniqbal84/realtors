<?php

namespace App\Http\Controllers;

use App\Models\Zm;
use App\Models\Bcm;
use App\Models\Team;
use Inertia\Inertia;
use App\Models\Office;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $teams = Team::with(['bcm.employee','employees','office'])
                    ->orderByDesc('created_at')
                    ->paginate(10);
        return inertia::render('Teams/Index',[
            'teams'=>$teams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $offices=Office::all();
    $bcms = Bcm::with(['employee', 'zm.employee'])->get();
        return inertia::render('Teams/Create',['bcms'=>$bcms,'offices'=>$offices]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        //dd($request->input('bcm_id'));
    
        $team = new Team([
            'name' => $request->input('name'),
            'bcm_id' => $request->input('bcm_id'),
            'office_id'=>$request->input('office_id'),
        ]);

        //dd($team);
    
    
        $team->save();
    
    
        return redirect()->route('team.index')->with('success','Team is Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show( Team $team)
    {
        //$bcm = Bcm::find($team->bcm_id);
        $bcm = Bcm::with('employee')->find($team->bcm_id);
        $zm = Zm::with('employee')->find($bcm->zm_id);
        //$members = DB::table('employees')->leftJoin('employee_designations','employees.designation_id','=','employee_designations.designation_id')->where('team_id', $team->team_id)->select('employees.*','employee_designations.name as designation')->get();
        $members = Employee::with('designation')->where('team_id', $team->team_id)->where('status','1')->get();
        return inertia::render('Teams/Show',['bcm'=>$bcm,'zm'=>$zm,'members'=>$members,'team'=>$team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Team $team)
    {
    $offices = Office::all();
    $bcms = Bcm::with(['employee', 'zm.employee',])
    ->get();

        return inertia::render('Teams/Edit',['team'=>$team,'bcms'=>$bcms,'offices'=>$offices]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //$team=Team::find($id);
        $request->validate([
            'name'=>'required',
        ]);
        $team->name=$request->input('name');
        $team->bcm_id=$request->input('bcm_id');
        $team->office_id=$request->input('office_id');
        $team->save();
        return redirect()->route('team.index')->with('success','Team is Updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        dd($id);
    }
}
