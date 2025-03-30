<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    public $timestamps=true;
    protected $fillable = ['first_name', 'middle_name', 'family', 'email', 'phone', 'department', 'job_title_id', 'salary', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at', 'nat_id', 'gender'];

}
