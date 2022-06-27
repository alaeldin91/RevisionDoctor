<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyModel extends Model
{
    use HasFactory;
    protected $table='currency_models';
    protected $primaryKey='id';
    protected $fillable = [
      
     'id','currency_name_ar','currency_name_en'
       ];
}
