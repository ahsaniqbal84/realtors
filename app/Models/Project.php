<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=['name','city','address','slug','target_amount','no_of_floor','description','status'];

    public function dailySales(){
        return $this->hasMany(DailySale::class,'project_id');
    }
}
