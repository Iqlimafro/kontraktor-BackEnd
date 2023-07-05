<?php

namespace App\Models;

use App\Models\User;
use App\Models\Form;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kontraktor extends Model
{
    use HasFactory;

    protected $table ='kontraktors';
    protected $guarded = ['id'];

    public function kontraktor()
    {
        return $this->belongsTo(Kontraktor::class,'kontraktor_id');
    }

    public function form()
    {
        return $this->hasMany(Form::class);
    }
}
