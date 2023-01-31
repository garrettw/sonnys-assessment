<?php

// Skipping includes for all the related files since I'd normally autoload them with Composer
// and this code isn't (I assume) going to be actually executed

$tv = new App\Provided\Television();
$cableBox = new App\Provided\CableBox();

$tvRemote = new App\Provided\TVRemote($tv);
$uniRemote = new App\UniversalRemote($tv, $cableBox);

$user = new App\RemoteUser();

$user->pressPowerOn($tvRemote);
$user->pressPowerOn($uniRemote);
