<?php

namespace App\Providers;


class CalculatorsProvider
{

    private static function getCalculatorClassFromProductName(string $name): string
    {
        $config = json_decode(file_get_contents('./config/products.json'), true);
        foreach ($config['products'] as $productConfig) {
            if ($name !== $productConfig['name']) {
                continue;
            }

            return $productConfig['calculator'];
        }

        return '\App\Calculators\DefaultCalculator';
    }

    public static function init(string $name, int $quality, int $sellIn)
    {
        $className = self::getCalculatorClassFromProductName($name);
        return new $className($name, $quality, $sellIn);
    }
}