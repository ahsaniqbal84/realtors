<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeDesignation extends Model
{
    use HasFactory;
    protected $fillable=['old_designation','new_designation','addedBy','employee_id',];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
