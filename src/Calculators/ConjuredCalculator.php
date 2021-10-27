<?php

namespace App\Calculators;

class ConjuredCalculator extends DefaultCalculator
{
    public function tick()
    {
        if ($this->quality > 0) {
            $this->quality = $this->quality - 2;
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0) {
            if ($this->quality > 0) {
                $this->quality = $this->quality - 2;
            }
        }
    }
}