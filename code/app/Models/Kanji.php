<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    use HasFactory;

    protected  $table = 'kanji';

    protected $fillable=[
        'kanji_character',
        'meaning',
        'reading_on',
        'reading_kon',
        'jlpt_level',
        'exemples',
        'radical',
        'grade',
        'memory_trick',
        'stroke_order',
        
    ];
}
