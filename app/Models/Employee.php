<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Employee extends Model
{
    //
    protected $table = 'employees';
    public $timestamps=true;
    protected $fillable = [
        'name', 
        'natid_number',
        'natid_type',
        'gender',
        'birth_date',
        'uuid', 
        'department_id', 
        'job_title', 
        'status', 
        'group_id',
        'created_by', 
        'updated_by', 
        'created_at', 
        'updated_at',
        'joined_at'
    ];

    protected $casts = [
        'name'              =>'array',
        'status'            => 'boolean',
        'created_at'        => 'datetime', 
        'updated_at'        => 'datetime',
        'joined_at'         => 'datetime'
    ];

    public function profilePicture() {
        return $this->legalInfo->profile_picture;
    }

    public function getNameAttribute($value) {
        $nameArr = json_decode($value, true);
        return $nameArr[App::getLocale()] ?? $nameArr['en'];
    }

    public function getArabicName() {
        $nameArr = json_decode($this->attributes['name'], true);
        return $nameArr['ar'];
    }

    public function getEnglishName() {
        $nameArr = json_decode($this->attributes['name'], true);
        return $nameArr['en'];
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function jobtitle()
    {
        return $this->belongsTo(Jobtitle::class, 'job_title');
    }

    public function hierarchygroup()
    {
        return $this->belongsTo(DepartmentLevel::class);
    }

    public function creator()
    {
        return $this->belongsTo(Admin::class, 'created_by');
    }

    public function editor()
    {
        return $this->belongsTo(Admin::class, 'updated_by');
    }

    public function reportsTo()
    {
        return $this->belongsTo(Employee::class, 'reports_to');
    }

    public function reports()
    {
        return $this->hasMany(Employee::class, 'reports_to');
    }

    public function salary()
    {
        return $this->hasOne(Salary::class);
    }

    public function legalInfo()
    {
        return $this->hasOne(LegalInfo::class);
    }

    function generateEmployeeId($prefix = '') {
        // توليد رقم عشوائي
        $random = mt_rand(1000, 9999);
    
        // دمج البادئة والرقم العشوائي
        $employeeId = $prefix . $random;
    
        return $employeeId;
    }

}
