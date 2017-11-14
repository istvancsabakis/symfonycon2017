<?php

namespace Composite;

use Assert\Assertion;
use Money\Money;
use ValueObject\Mass;

class Combo extends Product
{
    private $products;

    public function __construct(
        string $name,
        array $products,
        Money $unitPrice = null
    ) {
        Assertion::allIsInstanceOf($products, Product::class);
        Assertion::greaterOrEqualThan(count($products), 2, 'At least 2 products required.');

        parent::__construct(
            $name,
            $unitPrice ?: static::totalPrice(...$products),
            static::totalMass(...$products)
        );

        $this->products = $products;
    }

    private static function totalMass(Product...$products): Mass
    {
        $total = Mass::fromString('0 g');
        foreach ($products as $product) {
            $total = $total->add($product->getMass());
        }

        return $total;
    }

    private static function totalPrice(Product...$products): Money
    {
        $total = Money::EUR(0);
        foreach ($products as $product) {
            $total = $total->add($product->getUnitPrice());
        }

        return $total;
    }
}
