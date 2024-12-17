<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreReceipt extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $table = 'store_receipts';

    protected $fillable = [
        'reception_date',
        'reference',
        'reference_type',
        'serial',
        'direction',
        'brief',
        'notes',
        'status',
        'admin_id',
        'store_id',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
  
    protected $dates = ['deleted_at'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function entries()
    {
        return $this->hasMany(StoreEntry::class, 'receipt_id');
    }
}
