<?php

declare(strict_types=1);

namespace App\Service;

use App\Container\Container;
use App\Object\ObjectInterface;

class Calculator
{
    public function calculate(array $objects): string
    {
        $bigContainer = new Container(300, 200);
        $smallContainer = new Container(100, 100);

        $bigContainerArea = $bigContainer->getArea();
        $smallContainerArea = $smallContainer->getArea();

        $canTransport = true;
        $containers = [];
        $area = 0;

        /** @var ObjectInterface $object */
        foreach ($objects as $object) {
            if ($object->getWidth() > max($bigContainer->getWidth(), $bigContainer->getLength())) {
                $canTransport = false;
            }

            if ($object->getLength() > max($bigContainer->getWidth(), $bigContainer->getLength())) {
                $canTransport = false;
            }

            if ($object->getWidth() > $smallContainer->getWidth()
                || $object->getWidth() > $smallContainer->getLength()
                || $object->getLength() > $smallContainer->getWidth()
                || $object->getLength() > $smallContainer->getLength()
            ) {
                $containers = ['type' => 'big'];
            }

            $area += $object->getWidth() * $object->getLength();
        }

        if (!$canTransport) {
            return 'Objects cannot be transport';
        }
        if (!empty($containers) && $area <= $bigContainerArea) {
            return 'Objects can transport into 1 big container';
        }

        if ($area > $bigContainerArea) {
            $diffArea = $area - $bigContainerArea;

            return
                'Objects can transport into 1 big container and '
                . ceil($diffArea / $smallContainerArea)
                . ' small container(s)';
        } else {
            return 'Objects can transport into ' . $area / $smallContainerArea . ' small container(s)';
        }
    }
}
