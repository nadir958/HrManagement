<?php

namespace App\Controller\Admin;

use App\Entity\Departement;
use App\Entity\Furlough;
use App\Entity\Grade;
use App\Entity\Meeting;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // return parent::index();
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(MeetingCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hr Management');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Departements', 'fas fa-building', Departement::class);
        yield MenuItem::linkToCrud('Grades', 'fas fa-id-badge', Grade::class);
        yield MenuItem::linkToCrud('Meetings', 'fas fa-handshake', Meeting::class);
        yield MenuItem::linkToCrud('Furloughs', 'fas fa-clinic-medical', Furlough::class);
    }
}
