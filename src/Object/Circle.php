<?php

declare(strict_types=1);

namespace App\Object;

class Circle implements ObjectInterface
{
    public function __construct(public readonly int $radius)
    {
    }

    public function getWidth(): int
    {
        return $this->radius * 2;
    }

    public function getLength(): int
    {
        return $this->getWidth();
    }
}
