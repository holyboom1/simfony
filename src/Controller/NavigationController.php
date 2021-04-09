<?php

namespace App\Controller;

use App\Entity\Navigation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NavigationController extends AbstractController
{
//    #[Route('/navigation', name: 'navigation')]
//    public function index(): Response
//    {
//        return $this->render('navigation/index.html.twig', [
//            'controller_name' => 'NavigationController',
//        ]);
//    }

//    /**
//     * @Route("/navigation", name="create_navigate")
//     */
//    public function createNavigate(): Response
//    {
//        // you can fetch the EntityManager via $this->getDoctrine()
//        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
//        $entityManager = $this->getDoctrine()->getManager();
//
//        $navigation = new Navigation();
//        $navigation->setName('Keyboard');
//        $navigation->setLang(1999);
//        $navigation->setUrl('Ergonomic and stylish!');
//        $navigation->setPosition('1');
//
//        // tell Doctrine you want to (eventually) save the Product (no queries yet)
//        $entityManager->persist($navigation);
//
//        // actually executes the queries (i.e. the INSERT query)
//        $entityManager->flush();
//
//        return new Response('Saved new product with id '.$navigation->getId());
//    }
//
//    /**
//     * @Route("/navigation/{id}", name="navigation_show")
//     */
//    public function show($id)
//    {
//        $navigation = $this->getDoctrine()
//            ->getRepository(Navigation::class)
//            ->find($id);
//
//        if (!$navigation) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$id
//            );
//        }
//
//        return new Response('Check out this great product: '.$navigation->getName());
//
//        // or render a template
//        // in the template, print things with {{ product.name }}
//        // return $this->render('product/show.html.twig', ['product' => $product]);
//    }
//
//    /**
//     * @Route("/navigation/{id}", name="navigation_show")
//     */
    public function show(Navigation $navigation)
    {
        return  new Response($navigation->getName());
    }
}
