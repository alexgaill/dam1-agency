<?php

namespace App\Controller;

use App\Entity\Bien;
use App\Form\Biens\FiltresType;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class BienController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(ManagerRegistry $manager): Response
    {
        // On récupère les 5 derniers biens
        $biens = $manager->getRepository(Bien::class)->findBy([], ['id' => "DESC"], 5);

        return $this->render('bien/home.html.twig', [
            'biens' => $biens
        ]);
    }

    #[Route('/biens', name:'app_bien', methods: ['GET', 'POST'])]
    public function index (ManagerRegistry $manager, PaginatorInterface $paginator, Request $request): Response
    {
        $form = $this->createForm(FiltresType::class);
        $form->handleRequest($request);

        $repo = $manager->getRepository(Bien::class);
        $filtres = $request->query->all();
        $filtresList = $filtres['filtres'];
        if ($form->isSubmitted() && $form->isValid()) {
            $biens = $repo->filteredBiens(
                $filtresList['transactionType'],
                $filtresList['surfaceMin'],
                $filtresList['surfaceMax'],
                $filtresList['nbPiecesMin'],
                $filtresList['nbPiecesMax'],
                $filtresList['prixMin'],
                $filtresList['prixMax']
            );
        } else {
            $biens = $repo->findAll();
        }

        $pagination = $paginator->paginate(
            $biens, // Les éléments à gérer avec la pagination
            $request->query->getInt('page', 1), // Récupère le numéro de page affiché
            8 // Indique le nombre d'éléments à afficher par page
        );


        return $this->renderForm('bien/index.html.twig', [
            'pagination' => $pagination,
            'form' => $form
        ]);
    }
}
