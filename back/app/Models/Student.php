<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['firstName', 'lastName', 'class', 'image', 'gender', 'phone'];
    protected $hidden = ['created_at', 'updated_at'];
}
