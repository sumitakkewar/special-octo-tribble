<?php

namespace App\Utils;


abstract class Animal extends Character
{
    abstract public function wakeUp(): void;
    abstract public function doAction(): void;
}
