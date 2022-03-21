<?php

declare(strict_types=1);

namespace GildedRose\Specifications;

use GildedRose\Item;

class SpecificationQuality implements SpecificationInterface
{
    /**
     * Проверка качества
     */
    public static function isSatisfiedBy(Item &$item): void
    {
        if (str_contains($item->name, 'Sulfuras') === true) {
            return;
        }
        if (str_contains($item->name, 'Aged Brie') === true) {
            if ($item->sell_in >= 0) {
                if ($item->quality + 1 <= 51) {
                    $item->quality++;
                }
            } else {
                if ($item->quality + 2 <= 51) {
                    $item->quality = $item->quality + 2;
                }
            }
            return;
        }
        if (str_contains($item->name, 'Backstage passes') === true) {
            if ($item->sell_in <= 0) {
                $item->quality = 0;
            } elseif ($item->sell_in < 11) {
                if ($item->sell_in < 6) {
                    if ($item->quality + 3 < 51) {
                        $item->quality = $item->quality + 3;
                    } else {
                        $item->quality = 50;
                    }
                } elseif ($item->quality + 2 < 51) {
                    $item->quality = $item->quality + 2;
                } else {
                    $item->quality = 50;
                }
            } elseif ($item->quality + 1 < 51) {
                $item->quality = $item->quality + 1;
            }
            return;
        }

        if (str_contains($item->name, 'Conjured') === true) {
            if ($item->sell_in <= 0) {
                $i = 4;
            } else {
                $i = 2;
            }
            if ($item->quality - $i >= 0) {
                $item->quality = $item->quality - $i;
            } else {
                $item->quality = 0;
            }
            return;
        }

        if ($item->sell_in === 0) {
            $i = 2;
        } else {
            $i = 1;
        }
        if ($item->quality - $i >= 0) {
            $item->quality = $item->quality - $i;
        } else {
            $item->quality = 0;
        }
        return;
    }
}
