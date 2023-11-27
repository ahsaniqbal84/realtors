<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeTeam extends Model
{
    use HasFactory;
    protected $fillable=['old_team','new_team','addedBy','employee_id',];


    public function employee(){
        return $this->belongTo(Employee::class,'employee_id');
    }
}
