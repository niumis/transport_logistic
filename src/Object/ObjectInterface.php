<?php

declare(strict_types=1);

namespace App\Object;

interface ObjectInterface
{
    public function getWidth(): int;

    public function getLength(): int;
}
