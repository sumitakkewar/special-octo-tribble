<?php

namespace App\Utils;

use App\Character\Bird;
use App\Character\Dog;
use App\Character\Flower;
use App\Character\Rooster;
use App\DayManager;

class Helper
{
    public static function incrementTime()
    {
        $timeParts = explode(':', DayManager::$time);
        $hour = (int) $timeParts[0];
        $minute = (int) $timeParts[1];
        $amOrPm = explode(' ', $timeParts[1])[1];

        // login for skipping time
        // if ($hour == 8 && $minute == 0) {
        //     DayManager::$time = DayManager::$season == Season::SUMMER->value ? '08:00 pm' : '07:00 pm';
        // } else {
        $minute += 30;
        if ($minute == 60) {
            $minute = 0;
            $hour++;
        }
        if ($hour === 12) {
            $amOrPm = 'pm';
        }
        if ($hour === 13) {
            $hour = 1;
        }
        DayManager::$time = sprintf('%02d:%02d %s', $hour, $minute, $amOrPm);
        // }
    }

    public static function getCharacters()
    {
        return [
            new Bird('Bird'),
            new Flower('Flower'),
            new Rooster('Rooster'),
            new Dog('Dog')
        ];
    }

    public static function printCurrentTime()
    {
        self::println("Time is " . DayManager::$time);
    }

    public static function println($ln)
    {
        echo $ln . PHP_EOL;
    }
}
