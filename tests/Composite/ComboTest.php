<?php

namespace Tests\Composite;

use Composite\Combo;
use Composite\Product;
use Money\Currency;
use Money\Money;
use PHPUnit\Framework\TestCase;
use ValueObject\Mass;

class ComboTest extends TestCase
{
    public function testComboOfDigitalProductsHasNoMass(): void
    {
        $eur = new Currency('EUR');

        $combo = new Combo('Combo 1', [
            Product::digital('A', new Money(1000, $eur)),
            Product::digital('B', new Money(500, $eur)),
            Product::digital('C', new Money(700, $eur)),
        ]);

        $this->assertEquals(
            Mass::fromString('0 g'),
            $combo->getMass()
        );
    }

    public function testComboWithFixedPrice(): void
    {
        $eur = new Currency('EUR');

        $combo = new Combo(
            'Combo 1',
            [
                Product::digital('A', new Money(1000, $eur)),
                Product::digital('B', new Money(500, $eur)),
            ],
            new Money(1300, $eur)
        );

        $this->assertEquals(
            new Money(1300, $eur),
            $combo->getUnitPrice()
        );
    }

    public function testComboWithoutFixedPrice(): void
    {
        $eur = new Currency('EUR');

        $combo = new Combo('Combo 1', [
            Product::physical('A', new Money(1000, $eur), '150 g'),
            Product::physical('B', new Money(500, $eur), '1.2 kg'),
        ]);

        $this->assertEquals(
            new Money(1500, $eur),
            $combo->getUnitPrice()
        );

        $this->assertEquals(
            Mass::fromKilograms(1.35),
            $combo->getMass()
        );
    }
}
