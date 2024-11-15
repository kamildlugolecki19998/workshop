<?php

namespace App\Controller;

use App\Entity\BaseCar\BaseCar;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Request\ParamFetcherInterface;

#[OA\Tag(name: 'Test Controller group')]
class TestController extends AbstractFOSRestController
{
    // #[Route('/api/test/{id}', name: 'app_test', methods:['GET'])

    #[Rest\Get('/api/test/', name: 'blog_list'),
    QueryParam(name: 'id', description: 'Id to show')
    ]
    public function index(ParamFetcherInterface $paramFetcher): Response
    {
       $baseCar = new BaseCar();
       $baseCar->setBrandName('Audi');
       $baseCar->setModelName('A4');
       $baseCar->setSubModelName('B8');

    $jsonBaseCar = $baseCar->serialize();
    $againObject = $baseCar->createFromJson($jsonBaseCar);
    
    dd($jsonBaseCar, $againObject);
        return new JsonResponse();
    }
}
# config/routes.yam