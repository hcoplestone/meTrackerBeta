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

    /**
     * Returns a human readable description of the diary entry's mood
     *
     * @return string
     */
    public function getHumanMood()
    {
        switch ($this->mood) {
            case self::MOOD_HAPPY:
                return 'happy';
                break;
            case self::MOOD_SENSITIVE:
                return 'sensitive';
                break;
            case self::MOOD_SAD:
                return 'sad';
                break;
            case self::MOOD_CRISIS:
                return 'crisis';
                break;
        }
    }
}
