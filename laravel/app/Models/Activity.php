<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['customer_id', 'exercise_id', 'repetition', 'calori', 'like', 'duration'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function exercise(){
        return $this->belongsTo(Exercise::class);
    }
}
