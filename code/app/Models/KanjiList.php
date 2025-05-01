<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KanjiList extends Model
{
    protected $table='kanji_list';
    protected $fillable=[
        'user_id',
        'kanji_id',
        'isStruggled_meaning',

    ];
}
