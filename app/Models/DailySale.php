<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailySale extends Model
{
    use HasFactory;
    protected $fillable=['investment_amount','created_by','update_by'];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
}
