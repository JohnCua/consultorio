<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
  protected $table='roles';
  protected $primarykey='id';
  public $timestamps=true;
  protected $fillable=[
  'nombre',
  ];
}
