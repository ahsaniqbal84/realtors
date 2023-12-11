<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $primaryKey = 'team_id';
    protected $fillable=['name','bcm_id','created_by','update_by'];

    public function employees(){
        return $this->hasMany(Employee::class,'team_id');
    }

    public function dailyDales(){
        return $this->hasMany(DailySale::class,'team_id');
    }

    public function bcm(){
        return $this->belongsTo(Bcm::class,'bcm_id');
    }

}
