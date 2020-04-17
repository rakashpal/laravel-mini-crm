<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'company_id','first_name','last_name', 'email', 'phone','website'
    ];
    protected $appends=['full_name'];
    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');
    }
    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }
}
