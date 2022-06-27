<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
         'value',
         'currency_id'
        ];
        public function salary_model(){
          return $this->belongsTo(Salary::class);
        }

}
