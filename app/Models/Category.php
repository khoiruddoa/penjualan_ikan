<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function buy()
    {
        return $this->hasMany(Buy::class);
    }
    public function sell()
    {
        return $this->hasMany(Sell::class);
    }
}
