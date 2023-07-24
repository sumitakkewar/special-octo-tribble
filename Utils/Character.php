<?php

namespace App\Utils;

use App\Utils\ICharacter;

abstract class Character implements ICharacter
{
    protected $name;
    protected $awake = false;
    protected $earlyAwakeInWinter = false;
    protected $action;

    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract public function wakeUp(): void;

    public function sleep(): void
    {
        if ($this->isAwake()) {
            $this->awake = false;
            Helper::println($this->name . " sleeps");
        }
    }

    public function isAwake(): bool
    {
        return $this->awake;
    }

    public function awakeBeforeSunriseInWinter()
    {
        if ($this->earlyAwakeInWinter) {
            $this->wakeUp();
            Helper::println($this->name . " sings to make time pass by");
            Helper::println("");
        }
    }

    abstract public function doAction(): void;
}
