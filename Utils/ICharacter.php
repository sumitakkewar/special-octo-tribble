<?php

namespace App\Utils;

interface ICharacter{
    public function wakeUp(): void;
    public function sleep(): void;
    public function isAwake(): bool;
    public function doAction(): void;
}