<?php

declare(strict_types=1);

namespace App\Object;

class Square implements ObjectInterface
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
}
