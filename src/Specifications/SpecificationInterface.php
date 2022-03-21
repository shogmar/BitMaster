<?php

declare(strict_types=1);

namespace GildedRose\Specifications;

use GildedRose\Item;

interface SpecificationInterface
{
    public static function isSatisfiedBy(Item &$item): void;
}
