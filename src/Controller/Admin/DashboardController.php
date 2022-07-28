<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use App\Entity\Option;
use App\Controller\Admin\BienCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(BienCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Agency')
            ->disableDarkMode()
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Nos biens', 'fas fa-list', Bien::class)
            ->setAction('index');
        yield MenuItem::linkToCrud('Ajouter bien', 'fas fa-list', Bien::class)
            ->setAction('new')
        ;
        yield MenuItem::linkToCrud('Bien n°61', 'fas fa-list', Bien::class)
            ->setAction('detail')
            ->setEntityId(61)
        ;
        yield MenuItem::linkToCrud('Options', 'fas fa-plus', Option::class)
            ->setPermission("ROLE_ADMIN")
        ;
    }

    public function configueUserMenu( UserInterface $user): UserMenu
    {
        return parent::configureUserMenu($user)
        // ->setUserName($user->getPrenom())
        ->addMEnuItems([
            MenuItem::linkToLogout('Deconnexion', 'fas fa-sign-out')
        ])
        ;
    }
}
