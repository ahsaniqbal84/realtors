<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $primaryKey = 'office_id';
    protected $fillable=['name','address','city','status'];

    public function employees(){
        return $this->hasMany(Employee::class,'office_id');
    }

    public function teams(){
        return $this->hasMany(Office::class,'office_id');
    }

    
}
