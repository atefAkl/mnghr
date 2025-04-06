<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'basic_salary',
        'overtime_rate',
        'absent_rate',
        'allowances',
        'deductions',
        'net_salary',
        'effective_date',
        'created_by',
        'updated_by',
    ];

    protected $dates = [
        'effective_date',
        'created_at',
        'updated_at',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
