<?php

namespace App\Calculators;


class BackstageCalculator extends DefaultCalculator
{

    public function tick()
    {
        if ($this->quality < 50) {
            $this->quality = $this->quality + 1;

            if ($this->sellIn < 11) {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;
                }
            }
            if ($this->sellIn < 6) {
                if ($this->quality < 50) {
                    $this->quality = $this->quality + 1;
                }
            }
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0) {
            $this->quality = 0;
        }
    }
}