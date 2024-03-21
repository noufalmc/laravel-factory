<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\standard;

class student extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=['first_name','last_name','dob','email','std'];
    public function standard()
    {
        return $this->hasOne(standard::class, 'id','std');
    }

    public function getDateOfBirthFormatedAttribute()
    {
        return date('d-M-Y',strtotime($this->dob));
    }
    protected $appends =['date_of_birth_formated']; 
    public function scopeClassWise($query,$value='1')
    {
        return $query->where('std',$value);
    }
    public function setDobAttribute($value)
    {
        $this->attributes['dob']=date('Y-m-d',strtotime($value));
    }
}
