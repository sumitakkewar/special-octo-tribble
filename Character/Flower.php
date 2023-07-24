<?php

namespace App\Character;

use App\Constants\Common;
use App\DayManager;
use App\Utils\Character;
use App\Utils\Helper;
use App\Utils\PetalsColor;

class Flower extends Character
{
    private $petalColor = PetalsColor::GREEN->value;

    // logic for checking if its summer
    public function isSummer()
    {
        return DayManager::$sunriseTime === Common::SUNRISE_IN_SUMMER;
    }

    public function wakeUp(): void
    {
        if (!$this->isAwake()) {
            $this->awake = true;
            Helper::println($this->name . " woke up and color of petals are " . $this->petalColor);
        }
    }

    public function doAction(): void
    {
        if ($this->awake) {
            if ($this->isSummer()) {
                switch (DayManager::$time) {
                    case Common::SUNSET_IN_SUMMER:
                        $this->petalColor = PetalsColor::GREEN->value;
                        break;
                    case Common::SUNRISE_IN_SUMMER:
                    case "06:30 am":
                        $this->petalColor = PetalsColor::RED->value;
                        break;
                    default:
                        $this->petalColor = PetalsColor::BLUE->value;
                        break;
                }
            }
            Helper::println("Petals are " . $this->petalColor);
        }
    }
}
