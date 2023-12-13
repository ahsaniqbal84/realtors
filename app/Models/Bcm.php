<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bcm extends Model
{
    use HasFactory;
    protected $primaryKey = "bcm_id";
    protected $fillable = ['employee_id', 'zm_id'];

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function teams(){
        return $this->hasMany(Team::class,'bcm_id');
    }

    public function zm(){
        return $this->belongsTo(Zm::class,'zm_id');
    }
}
