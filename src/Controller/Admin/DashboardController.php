<?php

namespace App\Controller\Admin;

use App\Entity\Province;
use App\Entity\StatutJuridique;
use App\Entity\Ville;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Projet Azobe');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Statut juridique', 'fas fa-balance-scale-right', StatutJuridique::class);
        yield MenuItem::linkToCrud('Ville', 'fas fa-city', Ville::class);
        yield MenuItem::linkToCrud('Province', 'fas fa-chart-area', Province::class);
    }
}
