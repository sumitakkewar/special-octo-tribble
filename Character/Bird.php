<?php

namespace App\Character;

use App\Utils\Character;
use App\Utils\Helper;

class Bird extends Character
{
    private $nectarEaten = 0;
    protected $earlyAwakeInWinter = true;

    public function wakeUp(): void
    {
        if (!$this->isAwake()) {
            $this->awake = true;
            Helper::println($this->name . " woke up");
        }
    }

    public function doAction(): void
    {
        if ($this->isAwake()) {
            Helper::println($this->name . " goes off to feed on nectar");
            $nectar = rand(5, 15);
            $this->nectarEaten += $nectar;
            Helper::println($this->name . " eats nectar x" . $nectar);
            if ($this->nectarEaten > 10) {
                Helper::println($this->name . " needs to sleep");
                $this->sleep();
            }
        }
    }
}
