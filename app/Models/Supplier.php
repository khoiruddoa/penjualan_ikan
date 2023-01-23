<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{

    use HasFactory;
    protected $guarded = ['id'];


    public function buy()
    {
        return $this->hasMany(Buy::class);
    }
}
