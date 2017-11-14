<?php

namespace ValueObject;

use Assert\Assertion;

class Mass
{
    private $value;

    public function __construct(int $valueInGrams)
    {
        Assertion::greaterOrEqualThan($valueInGrams, 0);

        $this->value = $valueInGrams;
    }

    /**
     * 1.82 kg
     * 182 g
     */
    public static function fromString(string $string): self
    {
        list($value, $unit) = explode(' ', $string);

        if ('g' === $unit) {
            return new self($value);
        }

        if ('kg' === $unit) {
            return static::fromKilograms($value);
        }
        
        throw new \InvalidArgumentException('Invalid unit');
    }

    public static function fromKilograms(float $value): self
    {
        return new self($value * 1000);
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function add(Mass $other): self
    {
        return new self($other->value + $this->value);
    }
}
