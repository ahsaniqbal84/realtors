<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'employee_id';
    protected $fillable=['first_name','last_name','gender','code','office_id','manager_id','designation_id','department_id','team_id','join_date','resign_date','mobile_number','city','status'];
    
    public function designation()
    {
        return $this->belongsTo(EmployeeDesignation::class,'designation_id');
    }

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function office(){
        return $this->belongsTo(Office::class,'office_id');
    }

    public function department(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }

    public function dailySales(){
        return $this->hasMany(DailySale::class,'employee_id');
    }

    public function changeTeams(){
        return $this->hasMany(ChangeTeam::class,'employee_id');
    }

    public function customers(){
        return $this->hasMany(Customer::class,'employee_id');
    }

    public function changeDesignations(){
        return $this->hasMany(ChangeDesignation::class,'employee_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'manager_id');
    }

    public function bcm()
    {
        return $this->hasOne(Bcm::class, 'employee_id');
    }

    public function zm()
    {
        return $this->hasOne(Zm::class, 'employee_id');
    }


}
