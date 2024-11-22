<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use App\Utils\Utils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiController extends AbstractController
{
    #[Route('/api', name: 'app_api')]
    public function index(): Response
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
    #[Route('/api/products', name: 'app_api_products')]
    public function getProduits( Request $request, ProduitRepository $produitRepository)
    {
        $util = new Utils();
        $produits = $produitRepository->findAll();
        return $util->GetJsonResponse($request,$produits);

    }
}
