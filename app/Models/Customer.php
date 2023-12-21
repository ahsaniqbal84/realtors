<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primerkey='customer_id';
    protected $fillable=['first_name','employee_id','last_name','cnic','address','status','created_by','update_by'];

    public function dailyDales(){
        return $this->hasMany(DailySale::class,'customer_id');
    }

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
