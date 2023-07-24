<?php

namespace App\Utils;

interface IListener{
    public static function onTimeChanged(string $day, string $season): void;
}