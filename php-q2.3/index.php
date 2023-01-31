<?php

// Skipping includes for all the related files since I'd normally autoload them with Composer
// and this code isn't (I assume) going to be actually executed

$tv = new App\Provided\Television();
$cableBox = new App\Provided\CableBox();

$tvRemote = new App\Provided\TVRemote($tv);
$uniRemote = new App\UniversalRemote($tv, $cableBox);

$user = new App\RemoteUser();

$user->holdRemote($tvRemote)->pressPowerOn();
// still holding TV remote
$user->pressPowerOn($uniRemote);
// universal remote has been pressed, but still holding TV remote and now dropping it
$user->dropRemote();
// now holding no remote, so subsequent calls to $user->pressPowerOn() would fail
