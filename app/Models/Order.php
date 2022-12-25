<?php

namespace App\Models;

use Illuminate\Support\Carbon;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['customer'];
    public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        }
        if (request("start_date") || request("end_date")) {
            return $query->whereBetween('created_at', [request("start_date"), request("end_date")]);
        }
    }
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
        //merubah tanggal menjadi format indonesia
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function sell()
    {
        return $this->hasMany(Sell::class);
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
