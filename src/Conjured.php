<?php

namespace App;

class Conjured extends Item
{
    public function tick()
    {
        $this->sellIn -= 1;
        $this->quality -= 2;

        if ($this->sellIn <= 0) {
            $this->quality -= 2;
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }
    }
}
