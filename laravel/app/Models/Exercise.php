<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['name', 'type', 'unit', 'calori'];

    public function activities(){
        return $this->hasMany(Activity::class);
    }
}
