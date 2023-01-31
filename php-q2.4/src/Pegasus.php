<?php

namespace App;

class Pegasus implements CanFly, CanGallop
{
    use BirdStyleFlyAbility, HorseStyleGallopAbility;
}
