<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Food;

class Meal extends Model
{
    protected $fillable = ['customer_id', 'food_id', 'mealtime', 'like'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function food(){
        return $this->belongsTo(Food::class);
    }
}