<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function index(){
        return inertia::render('Employees/Index');
    }
    public function store(){

    }
    public function create(){

    }
}
