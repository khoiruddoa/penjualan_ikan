<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Buy extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['supplier', 'category'];
     public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        }
        if (request("start_date") || request("end_date")){
            return $query->whereBetween('created_at', [request("start_date"), request("end_date")]);
        }
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['date'])->translatedFormat('d F Y');
        //merubah tanggal menjadi format indonesia
    }


    public function category() //buat method baru. nama method harus sama dengan nama model
    {
        return $this->belongsTo(Category::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
