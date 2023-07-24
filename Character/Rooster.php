<?php

namespace App\Character;

use App\Utils\Animal;
use App\Utils\Helper;

class Rooster extends Animal
{
    protected $action = "sings";

    public function wakeUp(): void
    {
        if (!$this->isAwake()) {
            $this->awake = true;
            Helper::println($this->name . " woke up");
            Helper::println($this->name . " " . $this->action);
        }
    }

    public function doAction(): void
    {
    }
}
