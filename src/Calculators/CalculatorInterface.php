<?php

namespace App\Calculators;


interface CalculatorInterface
{
    // Removed return typehint due to Kahlan related Fatal error: A void function must not return a value
    public function tick();
}