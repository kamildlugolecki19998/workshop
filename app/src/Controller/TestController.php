<?php

namespace App\Controller;

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
        $id = $paramFetcher->get('id');
        // return $request->query->all();
        return new JsonResponse($id);
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
# config/routes.yam