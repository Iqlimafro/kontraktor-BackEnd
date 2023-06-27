<?php

namespace App\Models;

use App\Models\Form;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $guarded = ['id'];

    public function form()
    {
        $this->belongsTo(Form::class);
    }

}
