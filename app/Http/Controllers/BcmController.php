<?php

namespace App\Http\Controllers;

use App\Models\Zm;
use App\Models\Bcm;
use Inertia\Inertia;
use App\Models\Employee;
use Illuminate\Http\Request;

class BcmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bcms=Bcm::with('employee','zm.employee')->orderBy('bcm_id')->paginate(5);
        
        return Inertia::render('Bcms/Index',['bcms'=>$bcms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zms = Zm::with('employee')->get();
        $bcms = Employee::with('designation')->whereHas('designation', function ($query) {
            $query->where('designation_id', 4);
        })->whereDoesntHave('bcm')->get();

        return Inertia::render('Bcms/Create',['zms'=>$zms,'investmentManagers'=>$bcms]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'zm_id'=>'required',
        ]);

        Bcm::create([
            'employee_id' => $request->input('employee_id'),
            'zm_id' => $request->input('zm_id'),
        ]);
        return redirect()->route('bcm.index')->with('success','Bcm is Created!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bcm = Bcm::with('teams','employee','zm.employee')->find($id);
        return Inertia::render('Bcms/Show',['bcm'=>$bcm]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bcm = Bcm::find($id);
        $zms = Zm::with('employee')->get();
        $investment_managers = Employee::with('designation')->whereHas('designation', function ($query) {
            $query->where('designation_id', 4);
        })
        ->whereDoesntHave('bcm')
        ->orWhere('employee_id',$bcm->employee_id)->get();
        return Inertia::render('Bcms/Edit',['bcm'=>$bcm,'zms'=>$zms,'investmentManagers'=>$investment_managers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bcm $bcm)
    {
        // $oldBcmEmployee = Employee::find($bcm->employee_id);
        // $newBcmEmployee = Employee::find($request->input('employee_id'));
        
        $bcm->employee_id = $request->input('employee_id');
        $bcm->zm_id = $request->input('zm_id');
        $bcm->save();
        return redirect()->route('bcm.index')->with('success','Bcm is Updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
