<?php

namespace App\Models;

use Illuminate\Support\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['order'];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
        //merubah tanggal menjadi format indonesia
    }


    public function order() //buat method baru. nama method harus sama dengan nama model
    {
        return $this->belongsTo(Order::class);
    }
    public function pay()
    {
        return $this->hasMany(Pay::class);
    }
}
