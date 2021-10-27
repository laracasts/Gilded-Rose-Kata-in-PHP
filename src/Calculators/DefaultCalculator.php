<?php

namespace App\Calculators;

class DefaultCalculator implements CalculatorInterface
{
    public string $name;

    public int $quality;

    public int $sellIn;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    // Removed return typehint due to Kahlan related Fatal error: A void function must not return a value
    public function tick()
    {

        if ($this->quality > 0) {
            $this->quality = $this->quality - 1;
        }

        $this->sellIn = $this->sellIn - 1;

        if ($this->sellIn < 0) {
            if ($this->quality > 0) {
                $this->quality = $this->quality - 1;
            }
        }
    }
}