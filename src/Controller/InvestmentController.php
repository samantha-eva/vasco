<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Operation;
use App\Entity\Investment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class InvestmentController extends AbstractController
{
    #[Route('/investment', name: 'investment_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $operationId = $request->request->get('operation_id');
        $montant = $request->request->get('montant');

        $operation = $em->getRepository(Operation::class)->find($operationId);
        $user = $this->getUser();

        $now = new \DateTime();

        $investment = new Investment();
        $investment->setUser($user);
        $investment->setOperation($operation);
        $investment->setMontant((float)$montant);
        $investment->setDate($now);


        $em->persist($investment);
        $em->flush();

        $this->addFlash('success', 'Investissement enregistré !');
        return $this->redirectToRoute('app_operation');
    }
}
