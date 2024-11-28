<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ItemCategroy;
use App\Models\Unit;
use App\Models\User;

class Item extends Model
{
  
  public $timestamps=true;
  protected $table="items";

  protected $fillable=['barcode' ,'categorey','name','serial','breif','unit','image' ,'status','created_at','created_by','updated_by','updated_at'];
  public function category()
  {
      return $this->belongsTo(ItemCategroy::class);
  }

  public function unit()
  {
      return $this->belongsTo(Unit::class);
  }

  public function creator()
  {
      return $this->belongsTo(User::class, 'created_by');
  }

  public function editor()
  {
      return $this->belongsTo(User::class,  'updated_by');
  }
}








