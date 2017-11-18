<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permiso extends Model
{
  protected $table='permisos';
  protected $primarykey='id';
  public $timestamps=true;
  protected $fillable=[
  'id','idrol','iduser'
];
}
