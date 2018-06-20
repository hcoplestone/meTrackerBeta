<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaryEntry extends Model
{
    const MOOD_HAPPY = 1;
    const MOOD_SENSITIVE = 2;
    const MOOD_SAD = 3;
    const MOOD_CRISIS = 4;

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

    /**
     * Returns a human readable description of the diary entry's sleep log
     * @return string
     */
    public function getHumanSleep()
    {
        switch ($this->sleep) {
            case 1:
                return '0 to 3 hours';
                break;
            case 2:
                return '3 to 6 hours';
                break;
            case 3:
                return '6 to 9 hours';
                break;
            case 4:
                return '9 hours or more';
                break;
            default:
                return 'n/a';
                break;
        }
    }

    /**
     * Returns a human readable description of the diary entry's exercise log
     * @return string
     */
    public function getHumanExercise()
    {
        switch ($this->exercise) {
            case 1:
                return 'None';
                break;
            case 2:
                return '30 minutes or less';
                break;
            case 3:
                return '30 minutes to 1 hour';
                break;
            case 4:
                return '1 hour or more';
                break;
            default:
                return 'n/a';
                break;
        }
    }

    /**
     * Returns a human readable description of the diary entry's meditation log
     * @return string
     */
    public function getHumanMeditation()
    {
        switch ($this->meditation) {
            case 1:
                return 'None';
                break;
            case 2:
                return '5 minutes or less';
                break;
            case 3:
                return '5 to 30 minutes';
                break;
            case 4:
                return '30 minutes or more';
                break;
            default:
                return 'n/a';
                break;
        }
    }

    /**
     * Returns a human readable description of the diary entry's alcohol log
     * @return string
     */
    public function getHumanAlcohol()
    {
        switch ($this->alcohol) {
            case 1:
                return 'None';
                break;
            case 2:
                return '1 unit';
                break;
            case 3:
                return '2 units';
                break;
            case 4:
                return '3 units or more';
                break;
            default:
                return 'n/a';
                break;
        }
    }

    /**
     * Returns a human readable description of the diary entry's energy log
     * @return string
     */
    public function getHumanEnergy()
    {
        switch ($this->energy) {
            case 1:
                return 'Energised';
                break;
            case 2:
                return 'Good';
                break;
            case 3:
                return 'Low';
                break;
            case 4:
                return 'Exhausted';
                break;
            default:
                return 'n/a';
                break;
        }
    }
}
