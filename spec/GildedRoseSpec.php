<?php

use App\Item;
use App\GildedRose;

// Quality = How valuable the item is
// sellIn = The number of days you have to sell it, before it goes bad.
// At the end of the day, the system updates the quality.

describe('Gilded Rose', function () {

    describe('#updateQuality', function () {

        context ('normal Items', function () {

            it ('updates normal items before sell date', function () {
                $item = new GildedRose('normal', 10, 5); // quality, sell in X days

                $item->updateQuality();

                expect($item->quality)->toBe(9);
                expect($item->sellIn)->toBe(4);
            });

            it ('updates normal items on the sell date', function () {
                $item = new GildedRose('normal', 10, 0);

                $item->updateQuality();

                expect($item->quality)->toBe(8);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates normal items after the sell date', function () {
                $item = new GildedRose('normal', 10, -5);

                $item->updateQuality();

                expect($item->quality)->toBe(8);
                expect($item->sellIn)->toBe(-6);
            });

            it ('updates normal items with a quality of 0', function () {
                $item = new GildedRose('normal', 0, 5);

                $item->updateQuality();

                expect($item->quality)->toBe(0);
                expect($item->sellIn)->toBe(4);
            });

        });


        context('Brie Items', function () {

            it ('updates Brie items before the sell date', function () {
                $item = new GildedRose('Aged Brie', 10, 5);

                $item->updateQuality();

                expect($item->quality)->toBe(11);
                expect($item->sellIn)->toBe(4);
            });

            it ('updates Brie items before the sell date with maximum quality', function () {
                $item = new GildedRose('Aged Brie', 50, 5);

                $item->updateQuality();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(4);
            });

            it ('updates Brie items on the sell date', function () {
                $item = new GildedRose('Aged Brie', 10, 0);

                $item->updateQuality();

                expect($item->quality)->toBe(12);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Brie items on the sell date, near maximum quality', function () {
                $item = new GildedRose('Aged Brie', 49, 0);

                $item->updateQuality();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Brie items on the sell date with maximum quality', function () {
                $item = new GildedRose('Aged Brie', 50, 0);

                $item->updateQuality();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Brie items after the sell date', function () {
                $item = new GildedRose('Aged Brie', 10, -10);

                $item->updateQuality();

                expect($item->quality)->toBe(12);
                expect($item->sellIn)->toBe(-11);
            });

             it ('updates Briem items after the sell date with maximum quality', function () {
                $item = new GildedRose('Aged Brie', 50, -10);

                $item->updateQuality();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(-11);
            });

        });


        context('Sulfuras Items', function () {

            it ('updates Sulfuras items before the sell date', function () {
                $item = new GildedRose('Sulfuras, Hand of Ragnaros', 10, 5);

                $item->updateQuality();

                expect($item->quality)->toBe(10);
                expect($item->sellIn)->toBe(5);
            });

            it ('updates Sulfuras items on the sell date', function () {
                $item = new GildedRose('Sulfuras, Hand of Ragnaros', 10, 5);

                $item->updateQuality();

                expect($item->quality)->toBe(10);
                expect($item->sellIn)->toBe(5);
            });

            it ('updates Sulfuras items after the sell date', function () {
                $item = new GildedRose('Sulfuras, Hand of Ragnaros', 10, -1);

                $item->updateQuality();

                expect($item->quality)->toBe(10);
                expect($item->sellIn)->toBe(-1);
            });

        });


        context('Backstage Passes', function () {
            it ('updates Backstage pass items long before the sell date', function () {
                $item = new GildedRose('Backstage passes to a TAFKAL80ETC concert', 10, 11);

                $item->updateQuality();

                expect($item->quality)->toBe(11);
                expect($item->sellIn)->toBe(10);
            });

            it ('updates Backstage pass items close to the sell date', function () {
                $item = new GildedRose('Backstage passes to a TAFKAL80ETC concert', 10, 10);

                $item->updateQuality();

                expect($item->quality)->toBe(12);
                expect($item->sellIn)->toBe(9);
            });

            it ('updates Backstage pass items close to the sell data, at max quality', function () {
                $item = new GildedRose('Backstage passes to a TAFKAL80ETC concert', 50, 10);

                $item->updateQuality();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(9);
            });

            it ('updates Backstage pass items very close to the sell date', function () {
                $item = new GildedRose('Backstage passes to a TAFKAL80ETC concert', 10, 5);

                $item->updateQuality();

                expect($item->quality)->toBe(13); // goes up by 3
                expect($item->sellIn)->toBe(4);
            });

            it ('updates Backstage pass items very close to the sell date, at max quality', function () {
                $item = new GildedRose('Backstage passes to a TAFKAL80ETC concert', 50, 5);

                $item->updateQuality();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(4);
            });

            it ('updates Backstage pass items with one day left to sell', function () {
                $item = new GildedRose('Backstage passes to a TAFKAL80ETC concert', 10, 1);

                $item->updateQuality();

                expect($item->quality)->toBe(13);
                expect($item->sellIn)->toBe(0);
            });

            it ('updates Backstage pass items with one day left to sell, at max quality', function () {

                $item = new GildedRose('Backstage passes to a TAFKAL80ETC concert', 50, 1);

                $item->updateQuality();

                expect($item->quality)->toBe(50);
                expect($item->sellIn)->toBe(0);
            });

            it ('updates Backstage pass items on the sell date', function () {

                $item = new GildedRose('Backstage passes to a TAFKAL80ETC concert', 10, 0);

                $item->updateQuality();

                expect($item->quality)->toBe(0);
                expect($item->sellIn)->toBe(-1);
            });

            it ('updates Backstage pass items after the sell date', function () {

                $item = new GildedRose('Backstage passes to a TAFKAL80ETC concert', 10, -1);

                $item->updateQuality();

                expect($item->quality)->toBe(0);
                expect($item->sellIn)->toBe(-2);
            });

        });

    });

});
