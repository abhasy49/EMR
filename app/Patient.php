<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name', 'DOB', 'marital_stat', 'address', 'email', 'phone', 
        'mm_name', 'kin_name', 'kin_phone', 'kin_address',
        'occupation', 'employer_name', 'work_address', 'religion', 'whomToSee'
    ];

    public function scopeNurse($query)
    {
        return $query->where('whomToSee', "Nurse");
    }

    public function scopeDoctor($query)
    {
        return $query->where('whomToSee', "Doctor");
    }

    public function scopeLab($query)
    {
        return $query->where('whomToSee', "Lab Attendant");
    }

    public function patientvitals()
    {
        return $this->hasOne('App\Vital');
    }
    
    public function note()
    {
    	return $this->hasOne('App\Note');
    }
    
    public function test()
    {
        return $this->hasOne('App\Test');
    }
    
    public function drug()
    {
        return $this->hasOne('App\Drug');
    }

}