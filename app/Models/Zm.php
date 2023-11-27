<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zm extends Model
{
    use HasFactory;
    protected $fillable=['employee_id'];

    public function bcms(){
        return $this->hasMany(Bcm::class,'zm_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

}
