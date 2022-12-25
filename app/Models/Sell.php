<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['order', 'category'];

    public function category() //buat method baru. nama method harus sama dengan nama model
    {
        return $this->belongsTo(Category::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
