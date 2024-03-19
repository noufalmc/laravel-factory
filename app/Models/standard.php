<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\student;

class standard extends Model
{
    use HasFactory;
    protected $fillable =['name'];
    // public function students():BelongsTo
    // {
    //     return $this->belongsTo(student::class,'id','std');
    // }
    
}
