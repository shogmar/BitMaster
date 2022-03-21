<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Specifications\SpecificationQuality;
use GildedRose\Specifications\SpecificationSellIn;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }


    public function updateQuality(): void
    {
        $specSell = new SpecificationSellIn();
        $specQuality = new SpecificationQuality();
        foreach ($this->items as $item) {
            $specSell::isSatisfiedBy($item);
            $specQuality::isSatisfiedBy($item);
        }
    }
}
