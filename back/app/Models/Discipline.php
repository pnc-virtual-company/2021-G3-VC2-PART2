<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $fillable = [
        'reason',
        'notice_type',
        'start_date'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
