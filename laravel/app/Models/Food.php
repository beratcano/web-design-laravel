<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['name', 'major', 'calori'];

    public function meals(){
        return $this->hasMany(Meal::class);
    }
}
