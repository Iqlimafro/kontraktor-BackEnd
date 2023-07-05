<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Form;

class Tracking extends Model
{
    use HasFactory;

    protected $table = 'tracking';
    protected $guarded = ['id'];

    public function form()
    {
        return $this->belongsTo(Form::class,'form_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'username');
    }
}
