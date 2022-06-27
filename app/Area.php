<?php

namespace App;
use App\State_model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;
    protected $fillable = [
      'state_id',
       'areaName'
      ];
      public function state(){
        return $this->hasMany(State_model::class);
      }


    
}
