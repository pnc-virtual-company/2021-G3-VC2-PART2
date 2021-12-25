<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = ['reasson','datetime','amount'];
    protected $hidden = ['created_at', 'updated_at'];
    public function Student(){
        return $this->belongsTo(Student::class);
    }
   
}
