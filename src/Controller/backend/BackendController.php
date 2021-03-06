<?php

namespace App\Controller\backend;

use App\Entity\Aboutcompany;
use App\Entity\Blocks;
use App\Entity\Brands;
use App\Entity\Config;
use App\Entity\Feedback;
use App\Entity\Navigation;
use App\Entity\Services;
use App\Entity\Slider;
use App\Entity\Solutions;
use App\Entity\Solutionsitems;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BackendController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
//        return parent::index();
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        $url = $routeBuilder->setController(FeedbackCrudController::class)->generateUrl();

        return $this->redirect($url);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SimpleProject');
    }

    public function configureMenuItems(): iterable
    {
        return [
            yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'main'),
            yield MenuItem::linkToCrud('Навигация', 'fas fa-bars', Navigation::class),
            yield MenuItem::subMenu('Блоки', 'fa fa-cog')->setSubItems([
                 MenuItem::linkToCrud('Блоки', 'fas fa-th-large', Blocks::class),
                 MenuItem::linkToCrud('Блоки о компании', 'fas fa-th', Aboutcompany::class),
                ]),
            yield MenuItem::linkToCrud('Слайдер', 'fa fa-clone', Slider::class),
            yield MenuItem::linkToCrud('Услуги', 'fa fa-atom', Services::class),
            yield MenuItem::linkToCrud('Решения', 'fa fa-hand-spock', Solutions::class),
            yield MenuItem::linkToCrud('Брэнды', 'fa fa-copyright', Brands::class),
//            yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home'),
            yield MenuItem::linkToCrud('Feedback', 'fas fa-comments', Feedback::class),

            yield MenuItem::subMenu('Настройки', 'fa fa-cog')->setSubItems([
                MenuItem::linkToCrud('Config', 'fas fa-cogs', Config::class),])
            // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        ];
    }

}
