<?php

namespace App\Controller;

use App\Entity\Bien;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ManagerRegistry $manager): Response
    {
        // On récupère les 5 derniers biens
        $biens = $manager->getRepository(Bien::class)->findBy([], ['id' => "DESC"], 5);

        return $this->render('bien/index.html.twig', [
            'biens' => $biens
        ]);
    }
}
