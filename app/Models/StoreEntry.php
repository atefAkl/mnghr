<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
use App\Models\Unit;
use App\Models\item;
use App\Models\receipt;
use App\Models\Admin;

class StoreEntry extends Model
{

    public $timestamps = true;
    protected $table = "store_entries";

    protected $fillable = [
        'item_id',
        'store_id',
        'receipt_id',
        'ref_type_id',
        'unit_id',
        'inputs',
        'outputs',
        'notes',
        'status',
        'created_at',
        'created_by',
        'updated_by',
        'updated_at'
    ];
}
