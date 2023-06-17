<?php

namespace App\Models;

use App\Models\Kontraktor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'form';
    protected $guarded = ['id'];

    public function Kontraktor()
    {
        return $this->belongsTo(Kontraktor::class);
    }
}
