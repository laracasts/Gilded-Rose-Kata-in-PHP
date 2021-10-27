<?php

namespace App;


require_once './vendor/autoload.php';

class GildedRose
{
    public static function of($name, $quality, $sellIn)
    {
        return \App\Providers\CalculatorsProvider::init($name, $quality, $sellIn);
    }
}
