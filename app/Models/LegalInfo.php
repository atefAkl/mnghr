<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalInfo extends Model
{
    use HasFactory;

    protected $table = 'legal_info';
    public $timestamps = true;
    protected $fillable = [
        'employee_id',
        'nationality',
        'residence',
        'profile_picture',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
