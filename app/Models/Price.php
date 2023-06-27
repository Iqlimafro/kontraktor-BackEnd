<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $table = 'price';
    protected $guarded = ['id'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
