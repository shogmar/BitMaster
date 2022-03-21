<?php

declare(strict_types=1);

namespace GildedRose\Specifications;

use GildedRose\Item;

class SpecificationSellIn implements SpecificationInterface
{
    /**
     * Проверка срока годности
     */
    public static function isSatisfiedBy(Item &$item): void
    {
        if (str_contains($item->name, 'Sulfuras') === true) {
            return;
        }
        $item->sell_in--;
        return;
    }
}
