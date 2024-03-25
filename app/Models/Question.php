<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'choices',
        'correct_choice'
    ];

    protected $casts = [
        'choices' => 'array'
    ];

    public function title(){
        return $this->belongsTo('App\Models\Title');
    }
}
