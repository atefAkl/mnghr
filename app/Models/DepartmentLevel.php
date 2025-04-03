<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentLevel extends Model
{
    protected $fillable = ['key', 'name', 'description', 'order', 'hierarchy_group'];
    
    protected $casts = [
        'name'          => 'array',
        'description'   => 'array',
    ];

    public static $hierarchyGroups = [
        'leadership'    => 'Leadership',
        'management'    => 'Management',
        'operations'    => 'Operational',
        'support'       => 'Supportive',
        'teams'         => 'Teams & Units',
    ];
    
    /**
     * Get the name attribute.
     */
    public function getNameAttribute($value)
    {
        $nameArray = json_decode($value, true);
        return $nameArray['ar'] .' - '. $nameArray['en'];
    }
    /**
     * Get the Arabic name.
     */
    public function getArabicName()
    {
        $nameArray = json_decode($this->attributes['name'], true);
        return $nameArray['ar'] ?? null;
    }

    /**
     * Get the English name.
     */
    public function getEnglishName()
    {
        $nameArray = json_decode($this->attributes['name'], true);
        return $nameArray['en'] ?? null;
    }
    
    /**
     * Scope a query to order by order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
    
    /**
     * Scope a query to filter by hierarchy group.
     */
    public function scopeByGroup($query, $group)
    {
        return $query->where('hierarchy_group', $group);
    }
    
    /**
     * Get the description attribute.
     */
    public function getDescriptionAttribute($value)
    {
        if (null !== $value) {
        $descriptionArray = json_decode($value, true);
        return $descriptionArray[app()->getLocale()] ?? $descriptionArray['en'];
        } return null;
    }
}