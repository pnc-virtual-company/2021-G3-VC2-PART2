<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'explanations'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
