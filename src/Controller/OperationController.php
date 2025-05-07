<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\OperationRepository;

class OperationController extends AbstractController
{
    #[Route('/operation', name: 'app_operation')]
    public function index(OperationRepository $operationRepository): Response
    {

        //Je recupère la liste des opérations présent en base de données avec mon repository

        $operations = $operationRepository->findAllOperations();

        return $this->render('operation/index.html.twig', [
            'operations' => $operations,
        ]);
    }
}
