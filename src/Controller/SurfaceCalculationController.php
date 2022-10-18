<?php

declare(strict_types=1);

namespace App\Controller;

use App\Object\Circle;
use App\Object\Square;
use App\Service\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SurfaceCalculationController extends AbstractController
{
    #[Route('/surface/calculation', name: 'app_surface_calculation')]
    public function index(Calculator $calculator): Response
    {
        $result1 = $calculator->calculate([new Circle(50), new Circle(50), new Square(100, 100)]);
        $result2 = $calculator->calculate([new Square(400, 400), new Circle(100)]);
        $result3 = $calculator->calculate([new Square(150, 100), new Square(50, 50), new Circle(50)]);
        $result4 = $calculator->calculate([new Square(250, 200), new Square(50, 50), new Circle(50)]);

        return $this->render('surface_calculation/index.html.twig', [
            'results' => [
                $result1,
                $result2,
                $result3,
                $result4,
            ],
        ]);
    }
}
