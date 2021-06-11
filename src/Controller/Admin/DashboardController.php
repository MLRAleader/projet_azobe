<?php

namespace App\Controller\Admin;

use App\Entity\Activite;
use App\Entity\Appel;
use App\Entity\AppelCategory;
use App\Entity\Article;
use App\Entity\GroupeActivite;
use App\Entity\Organisation;
use App\Entity\ThemeActivite;
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
        yield MenuItem::linkToCrud('Groupe d\'activité', 'fas fa-layer-group', GroupeActivite::class);
        yield MenuItem::linkToCrud('Thème d\'activité', 'fas fa-list', ThemeActivite::class);
        yield MenuItem::linkToCrud('Liste d\'activité', 'fas fa-list', Activite::class);
        yield MenuItem::linkToCrud('Liste d\'article', 'fas fa-blog', Article::class);
        yield MenuItem::linkToCrud('Catégories d\'appels', 'fas fa-blog', AppelCategory::class);
        yield MenuItem::linkToCrud('Liste d\'appels', 'fas fa-blog', Appel::class);      
        yield MenuItem::linkToCrud('Liste des organisations', 'fa fa-chart-bar',Organisation::class );
    }
}
