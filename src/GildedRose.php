<?php

namespace App;

class GildedRose
{
    public static function of($name, $quality, $sellIn)
    {
        // TODO: Fix OCP issue => Replace with dynamic values
        switch ($name) {
            case 'Aged Brie':
                return new \App\Calculators\AgedBrieCalculator($name, $quality, $sellIn);
            case 'Sulfuras, Hand of Ragnaros':
                return new \App\Calculators\SulfurasCalculator($name, $quality, $sellIn);
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new \App\Calculators\BackstageCalculator($name, $quality, $sellIn);
            default:
                return new \App\Calculators\DefaultCalculator($name, $quality, $sellIn);
        }

    }
}
