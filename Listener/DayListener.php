<?php

namespace App\Listener;

use App\Constants\Common;
use App\DayManager;
use App\Utils\Helper;
use App\Utils\IListener;
use App\Utils\Season;

class DayListener implements IListener
{

    public static function onTimeChanged(string $day, string $season): void
    {

        $characters = Helper::getCharacters();

        // setting time for start day
        // this covers case where, bird wakeups early in winters
        DayManager::$time = Common::SUNRISE_IN_SUMMER;
        Helper::println("[" . DayManager::$time . "] Day " . $day);
        if ($season == Season::WINTER->value) {
            // check if any character can wake early in winter
            foreach ($characters as $character) {
                $character->awakeBeforeSunriseInWinter();
            }

            //Set Sunrise time for winter
            DayManager::$time = Common::SUNRISE_IN_WINTER;
        }

        Helper::printCurrentTime();
        Helper::println("The sunrise. We are in " . $season);

        // wake up other characters
        foreach ($characters as $character) {
            $character->wakeUp();
        }

        Helper::println("");

        // check for day interval and end time
        while (DayManager::$time != DayManager::$sunsetTime) {
            Helper::printCurrentTime();
            foreach ($characters as $character) {
                $character->doAction();
            }
            Helper::println("");
            Helper::incrementTime();
        }

        Helper::printCurrentTime();
        Helper::println("Sun Sets");
        foreach ($characters as $character) {
            if ($character->isAwake()) $character->sleep();
        }
        Helper::println("");
    }
}
