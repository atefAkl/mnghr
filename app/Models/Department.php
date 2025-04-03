<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Department extends Model
{
    protected $fillable = [
        'name',
        'name_en',
        'description',
        'description_en',
        'status',
        'parent_id',
        'level_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function level()
    {
        return $this->belongsTo(DepartmentLevel::class, 'level_id');
    }

    /**
     * Get the name of the department based on the current locale.
     *
     * @return string
     */
    public function name()
    {
        // return App::getLocale() == 'ar' ? $this->name : $this->name_en;
        return $this->name;
    }

    /**
     * Get the description of the department based on the current locale.
     *
     * @return string
     */
    public function description()
    {
        // return App::getLocale() == 'ar' ? $this->description : $this->description_en;
        return $this->description;
    }
}
