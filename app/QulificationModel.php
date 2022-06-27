<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QulificationModel extends Model
{
    use HasFactory;
    protected $table='qulification_models';
    protected $primaryKey='id';
    protected $fillable = [
      
     'id','Qulification_name'
       ];
}
