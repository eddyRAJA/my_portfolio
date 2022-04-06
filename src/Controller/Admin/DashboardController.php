<?php

namespace App\Controller\Admin;

use App\Entity\Techno;
use App\Entity\AboutMe;
use App\Entity\Contact;
use App\Entity\Project;
use App\Entity\Timeline;
use App\Entity\Illustration;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('My Portfolio');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('About me', 'fas fa-list', AboutMe::class);
        yield MenuItem::linkToCrud('My contacts', 'fas fa-list', Contact::class);
        yield MenuItem::linkToCrud('The illustrations', 'fas fa-list', Illustration::class);
        yield MenuItem::linkToCrud('My projects', 'fas fa-list', Project::class);
        yield MenuItem::linkToCrud('The technos', 'fas fa-list', Techno::class);
        yield MenuItem::linkToCrud('My timeline', 'fas fa-list', Timeline::class);
    }
}
