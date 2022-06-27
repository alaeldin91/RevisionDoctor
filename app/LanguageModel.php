<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageModel extends Model
{
    use HasFactory;
    protected $table='language_models';
    protected $primaryKey='id';
    protected $fillable = [
      
     'id','language_name_ar','language_name_en'
       ];
}
