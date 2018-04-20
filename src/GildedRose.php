<?php

namespace App;

class GildedRose
{
    public $name;

    public $quality;

    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->name == 'Conjuras') {
            $this->quality = $this->sellIn < 0 ? $this->quality - 4 : $this->quality - 2;
            $this->sellIn = $this->sellIn -1;
        } else {

            if ($this->name != 'Aged Brie' AND $this->name != 'Backstage passes to a TAFKAL80ETC concert') {
                $this->quality = ($this->name != 'Sulfuras, Hand of Ragnaros' AND $this->quality > 0) ? $this->quality - 1 : $this->quality;
            } else {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;

                    if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        $this->quality = ($this->sellIn < 11 AND $this->quality < 50) ? $this->quality + 1 : $this->quality;
                        $this->quality = ($this->sellIn < 6 AND $this->quality < 50) ? $this->quality + 1 : $this->quality;
                    }
                }
            }

            $this->sellIn = ($this->name != 'Sulfuras, Hand of Ragnaros') ? $this->sellIn - 1 : $this->sellIn;


            if ($this->sellIn < 0) {
                if ($this->name != 'Aged Brie') {
                    if ($this->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        $this->quality = ($this->quality > 0 AND $this->name != 'Sulfuras, Hand of Ragnaros') ? $this->quality - 1 : $this->quality;
                    } else {
                        $this->quality = $this->quality - $this->quality;
                    }
                } else {
                    if ($this->quality < 50) {
                        $this->quality = $this->quality + 1;
                    }
                }
            }
        }
    }
}
