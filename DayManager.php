<?php

namespace App;

use App\Constants\Common;
use App\Listener\DayListener;
use App\Utils\Season;

class DayManager
{
    private $season;
    private $day;
    private $days;
    public static $time;
    public static $sunriseTime = Common::SUNRISE_IN_SUMMER;
    public static $sunsetTime = Common::SUNSET_IN_SUMMER;

    public function __construct(Season $season, int $days)
    {
        $this->season = $season->value;
        $this->days = $days;
        if($this->season === Season::WINTER->value){
            self::$sunriseTime = Common::SUNRISE_IN_WINTER;
            self::$sunsetTime = Common::SUNSET_IN_WINTER;
        }
    }

    public function startDay()
    {
        for ($this->day = 1; $this->day <= $this->days; $this->day++) {
            DayListener::onTimeChanged($this->day, $this->season);
        }
    }
}
