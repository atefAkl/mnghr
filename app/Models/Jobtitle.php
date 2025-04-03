<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Jobtitle extends Model
{
    use HasFactory;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'title',
        'parent_id',
        'description',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'status',
    ];

    protected $casts = [
        'status'        => 'boolean',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
        'created_by'    => 'integer',
        'updated_by'    => 'integer',
        'title'         => 'array',
        'description'   => 'array'
    ];

    // Example of a relationship: If a job title is associated with employees
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
    
    public function getTitleAttribute($value) {
        $titleArray = json_decode($value, true);
        return $titleArray[App::getLocale()] ?? $titleArray['en'];
    }

    public function getDescriptionAttribute($value) {
        $descriptionArray = json_decode($value, true);
        return $descriptionArray[App::getLocale()] ?? $descriptionArray['en'];
    }

    public function getArabicTitle() {
        $titleArray = json_decode($this->attributes['title'], true);
        return $titleArray['ar'] ?? null;
    }
    
    public function getEnglishTitle() {
        $titleArray = json_decode($this->attributes['title'], true);
        return $titleArray['en'] ?? null;
    }

    public function getArabicDescription() {
        $descriptionArray = json_decode($this->attributes['description'], true);
        return $descriptionArray['ar'];
    }

    public function getEnglishDescription() {
        $descriptionArray = json_decode($this->attributes['description'], true);
        return $descriptionArray['en'];
    }

}