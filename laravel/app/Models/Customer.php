<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Meal;
use App\Models\Activity;

class Customer extends Model
{
    protected $fillable = ['name', 'surname', 'birthYear', 'gender'];

    public function meals(){
        return $this->hasMany(Meal::class);
    }

    public function activities(){
        return $this->hasMany(Activity::class);
    }
}
