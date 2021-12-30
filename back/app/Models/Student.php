<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['firstName', 'lastName','email', 'class','password','image', 'gender', 'phone'];
    protected $hidden = ['created_at', 'updated_at'];

    public function Permission(){
        return $this->hasMany(Permission::class);
    }
    public function Discipline()
    {
        # code...
        return $this->hasMany(Discipline::class);
    }
}
