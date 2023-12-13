<?php

namespace App\Http\Controllers;

use App\Models\Zm;
use App\Models\Bcm;
use App\Models\Team;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    
        //$filters=$request->only(['name','code','status','designation','team','gender']);
        $teams = Team::leftJoin('bcms','bcms.bcm_id','=','teams.bcm_id')
        ->leftJoin('employees','employees.employee_id','=','bcms.employee_id')
        ->select('teams.*','employees.first_name','employees.last_name')->orderByDesc('teams.created_at')->paginate(10);

        //$teams=$query->paginate(3);
       // dd($teams);
        // if($filters['name']??null){
        //     $query->where('first_name',$filters['name'])
        //         ->orWhere('last_name',$filters['name']);
        // }
        // if($filters['code']??null){
        //     $query->where('code',$filters['code']);
        // }if($filters['gender']??null){
        //     $query->where('gender',$filters['gender']);
        // }
        // if(isset($filters['status'])){
        //     $query->where('status','=',$filters['status']);
        // }
        // if($filters['designation']??null){
        //     $query->where('employees.designation_id',$filters['designation']);
        // }if(isset($filters['team'])){
        //     if($filters['team']=="none"){
        //         $query->where('employees.team_id',null);
        //     }
        //     else{
        //     $query->where('employees.team_id',$filters['team']);
        //     }
        // }
        // $employees = 
        //     $query->paginate(8)
        //     ->withQueryString();
        return inertia::render('Teams/Index',[
            'teams'=>$teams,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //     $teamEarnings = DB::table('daily_sales')
    // ->leftJoin('teams', 'daily_sales.team_id', '=', 'teams.team_id')
    // ->select(
    //     DB::raw('SUM(investment_amount) as team_earning'),
    //     'teams.team_id',
    //     'teams.name',
    //     DB::raw('COUNT(*) as count')
    // )
    // ->groupBy('teams.team_id','teams.name')
    // ->get();
    // dd($teamEarnings);
        $teams=Team::all();
        $bcms = Bcm::leftJoin('employees as bcm_employee', 'bcms.employee_id', '=', 'bcm_employee.employee_id')
    ->leftJoin('zms', 'zms.zm_id', '=', 'bcms.zm_id')
    ->leftJoin('employees as zm_employee', 'zm_employee.employee_id', '=', 'zms.employee_id')
    ->select(
        'bcms.*',
        'bcm_employee.first_name as first_name',
        'bcm_employee.last_name as last_name',
        'zm_employee.first_name as zonal_manager_first_name',
        'zm_employee.last_name as zonal_manager_last_name'
    )
    ->get();
        //$bcms=Bcm::leftJoin('employees','bcms.employee_id','=','employees.employee_id')->leftJoin('zms','zms.zm_id','=','bcms.zm_id')->select('bcms.*','employees.first_name','employees.last_name','zms.employee_id as zonal_manager')->get();
        //dd($bcms);
        return inertia::render('Teams/Create',['teams'=>$teams,'bcms'=>$bcms]);
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
        $members = DB::table('employees')->leftJoin('employee_designations','employees.designation_id','=','employee_designations.designation_id')->where('team_id', $team->team_id)->select('employees.*','employee_designations.name as designation')->get();
        
        return inertia::render('Teams/Show',['bcm'=>$bcm,'zm'=>$zm,'members'=>$members]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Team $team)
    {
        
        $bcms = Bcm::leftJoin('employees as bcm_employee', 'bcms.employee_id', '=', 'bcm_employee.employee_id')
    ->leftJoin('zms', 'zms.zm_id', '=', 'bcms.zm_id')
    ->leftJoin('employees as zm_employee', 'zm_employee.employee_id', '=', 'zms.employee_id')
    ->select(
        'bcms.*',
        'bcm_employee.first_name as first_name',
        'bcm_employee.last_name as last_name',
        'zm_employee.first_name as zonal_manager_first_name',
        'zm_employee.last_name as zonal_manager_last_name'
    )
    ->get();

        return inertia::render('Teams/Edit',['team'=>$team,'bcms'=>$bcms]);
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
        $team['bcm_id']=$request->input('bcm_id');
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
