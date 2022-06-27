<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State_model extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',

    ];
   
}
