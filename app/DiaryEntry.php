<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaryEntry extends Model
{
    const MOOD_HAPPY = 0;
    const MOOD_SENSITIVE = 1;
    const MOOD_SAD = 2;
    const MOOD_CRISIS = 3;

    protected $guarded = [];
}
