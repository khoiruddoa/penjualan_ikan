<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pay extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['bill'];


    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
        //merubah tanggal menjadi format indonesia
    }
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
