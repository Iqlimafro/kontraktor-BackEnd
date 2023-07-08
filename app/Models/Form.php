<?php

namespace App\Models;

use App\Models\Kontraktor;
use App\Models\Price;
use App\Models\Reviews;
use App\Models\User;
use App\Models\Tracking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'form';
    protected $guarded = ['id'];

    public function kontraktor()
    {
        return $this->belongsTo(Kontraktor::class,'kontraktor_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function tracking()
    {
        return $this->hasOne(Tracking::class);
    }

    public function reviews()
    {
        return $this->hasOne(Reviews::class);
    }
}
