<?php

namespace App\Models;
use App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class StoreReceipt extends Model
{
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
      'admin_id',
      'store_id',
      'created_by',
      'created_at',
      'updated_by',
      'updated_at'
  ];

  public function admin()
  {
      return $this->belongsTo(Admin::class, 'admin_id' ,'id');
  }
}
