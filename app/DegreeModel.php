<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DegreeModel extends Model
{
    use HasFactory;
    protected $table='degree_models';
    protected $primaryKey='id';
    protected $fillable = [
      
     'id','degree_name'
       ];
}
