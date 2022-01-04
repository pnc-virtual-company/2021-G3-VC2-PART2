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
        'start_date',
        'icon_type'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $casts= [
        'start_date'=>'datetime:l-g-Y ',
        'end_date'=>'datetime:l-g-Y '
    ];

    public function student()
    {
        # code...
        return $this->belongsTo(Student::class);
    }
}
