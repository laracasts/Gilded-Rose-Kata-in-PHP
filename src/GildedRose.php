<?php

namespace App;

use App\Calculators\CalculatorInterface;

require_once './vendor/autoload.php';

class GildedRose
{
    public static function of(string $name, int $quality, int $sellIn): CalculatorInterface
    {
        return \App\Providers\CalculatorsProvider::init($name, $quality, $sellIn);
    }
}
