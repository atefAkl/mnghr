<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employees';
    public $timestamps=true;
    protected $fillable = [
        'name_ar', 
        'name_en', 
        'nat_id', 
        'gender',
        'birth_date',
        'country', 
        'employee_id', 
        'email', 
        'phone', 
        'department', 
        'job_title', 
        'hire_date', 
        'salary_package_id', 
        'address', 
        'city', 
        'state', 
        'zip_code', 
        'status', 
        'reports_to', 
        'created_by', 
        'updated_by', 
        'created_at', 
        'updated_at', 
    ];
}
