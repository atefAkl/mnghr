<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ItemCategroy;
use App\Models\Unit;
use App\Models\Admin;

class Item extends Model
{
  
  public $timestamps=true;
  protected $table="items";

  protected $fillable=['barcode' ,'categorey','name','serial','breif','unit','image' ,'status','created_at','created_by','updated_by','updated_at'];



  public function units()
  {
      return $this->belongsTo(Unit::class ,'unit' ,'id');
  }

  public function creator()
  {
      return $this->belongsTo(Admin::class, 'created_by','id' );
  }

  public function editor()
  {
      return $this->belongsTo(Admin::class,  'updated_by' ,'id');
  }
}








