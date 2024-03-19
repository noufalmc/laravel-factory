<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\standard;

class student extends Model
{
    use HasFactory;
    protected $fillable=['first_name','last_name','dob','email','std'];
    public function standard()
    {
        return $this->hasOne(standard::class, 'id','std');
    }

    public function getDobAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-M-Y');
    }
    public function scopeClassWise($query,$value='1')
    {
        return $query->where('std',$value);
    }
}
