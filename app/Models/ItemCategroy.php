<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategroy extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'items_categories';
    protected $fillable = ['name', 'parent_id', 'brief', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'];

    public static function roots()
    {
        return self::where('parent_id', 1)->get();
    }

    public function parent()
    {
        return $this->belongsTo(ItemCategroy::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(ItemCategroy::class, 'parent_id');
    }
    public static function centralCats()
    {
        return self::where('parent_id', '>', 1)->get();
    }
}
