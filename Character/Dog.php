<?php

namespace App\Character;

use App\Utils\Animal;
use App\Utils\Helper;

class Dog extends Animal
{
    protected $action = "barks";

    public function wakeUp(): void
    {
        if (!$this->isAwake()) {
            $this->awake = true;
            Helper::println($this->name . " woke up");
            Helper::println($this->name . " " . $this->action);
        }
    }

    public function doAction(): void {
        
    }
}
