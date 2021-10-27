<?php

namespace App;

require_once './vendor/autoload.php';

class GildedRose
{
    public static function of($name, $quality, $sellIn)
    {
        $config = json_decode(file_get_contents('./config/products.json'), true);
        foreach ($config['products'] as $productConfig) {
            if ($name !== $productConfig['name']) {
                continue;
            }

            return new $productConfig['calculator']($name, $quality, $sellIn);
        }

        return new \App\Calculators\DefaultCalculator($name, $quality, $sellIn);

    }
}
