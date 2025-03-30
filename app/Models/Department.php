<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'arabic_name',
        'description',
        'arabic_description',
        'status',
        'created_at',
        'updated_at',
    ];
}
