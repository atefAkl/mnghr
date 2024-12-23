<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreReceipt extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    private static $reference_type = [
        '1' => 'Purchases',
        '2' => 'Sales inverse',
        '3' => 'Purchases inverse',
        '4' => 'Transfer',
        '5' => 'Sales',
        '6' => 'Project supplies',
        '7' => 'Administration supplies',
        '8' => 'Credit transfer',
    ];

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

    public static function getReferenceTypes()
    {
        return self::$reference_type;
    }

    protected $dates = ['deleted_at'];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function getTypeName()
    {
        return self::$reference_type[$this->reference_type];
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function entries()
    {
        return $this->hasMany(StoreEntry::class, 'receipt_id');
    }
}
