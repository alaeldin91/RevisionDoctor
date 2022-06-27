<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceModel extends Model
{
    use HasFactory;
    protected $table='experience_models';
    protected $primaryKey='id';
    protected $fillable = [
      
     'id','experience_name_ar','experience_name_er'
       ];
}
