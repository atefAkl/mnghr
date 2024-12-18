<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $table = 'stores';
    protected $fillable = [
        'name',
        'address',
        'brief',
        'code',
        'store_id',
        'phone',
        'email',
        'admin_id',
        'branch_id',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    /* get Admin info where admin->id equals to omahmed_id
    **
    **
    */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
