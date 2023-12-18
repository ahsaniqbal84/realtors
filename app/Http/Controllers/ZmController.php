<?php

namespace App\Http\Controllers;

use App\Models\Zm;
use Inertia\Inertia;
use App\Models\Employee;
use Illuminate\Http\Request;

class ZmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zms = Zm::with('employee')->paginate(5);
        return Inertia::render('Zms/Index',['zms'=>$zms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $zms = Employee::with('designation')->whereHas('designation', function ($query) {
            $query->where('designation_id', 5);
        })->whereDoesntHave('zm')->get();

        return Inertia::render('Zms/Create',['zms'=>$zms]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
        ]);
        $employee = Employee::find($request->input('employee_id'));
        $employee->update(['designation_id' => 5]);

        Zm::create([
            'employee_id' => $request->input('employee_id'),
        ]);
        return redirect()->route('zm.index')->with('success','Zonal Manager is Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $zm = Zm::with('bcms.employee','employee')->find($id);
        return Inertia::render('Zms/Show',['zm'=>$zm]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $current_zm=Zm::find($id);
        $zms = Employee::with('designation')->whereHas('designation', function ($query) {
            $query->where('designation_id', 5);
        })
        ->whereDoesntHave('zm')
        ->orWhere('employee_id',$current_zm->employee_id)->get();

        return Inertia::render('Zms/Edit',['zms'=>$zms,'currentZm'=>$current_zm]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zm $zm)
    {
        $zm->employee_id = $request->input('employee_id');
        $zm->save();
        return redirect()->route('zm.index')->with('success','Zm is Updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
