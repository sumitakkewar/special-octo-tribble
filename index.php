<?php

include "autoload.php";

use App\DayManager;
use App\Utils\Season;

$dayManager = new DayManager(Season::SUMMER, 10);
// $dayManager = new DayManager(Season::WINTER, 12);
$dayManager->startDay();