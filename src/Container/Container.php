<?php

declare(strict_types=1);

namespace App\Container;

class Container
{
    public function __construct(public readonly int $width, public readonly int $length)
    {
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getArea(): int
    {
        return $this->getWidth() * $this->getLength();
    }
}
