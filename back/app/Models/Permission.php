<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'reasson',
        'start_date',
        'amount'
    ];
    protected $hidden = [
        'created_at',
         'updated_at'
    ];

    protected $casts= [
        'start_date'=>'datetime:l-g-Y g:A',
        'end_date'=>'datetime:l-g-Y g:A'
    ];
    public function Student(){
        return $this->belongsTo(Student::class);
    }
   
}
