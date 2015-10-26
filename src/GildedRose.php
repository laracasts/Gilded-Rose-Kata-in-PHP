<?php

namespace App;

class GildedRose
{
    protected static $lookup = [
        'normal' => Normal::class,
        'Aged Brie' => Brie::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePass::class,
        'Conjured Mana Cake' => Conjured::class
    ];

    public static function of($name, $quality, $sellIn) {
        $class = isset(static::$lookup[$name])
            ? static::$lookup[$name]
            : Item::class;

        return new $class($quality, $sellIn);
    }
}
