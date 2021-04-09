<?php

namespace App\Controller;

use App\Entity\Navigation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route ("/")
     */
    public function index () : Response
    {

        $navigation =  $this->getDoctrine()->getRepository(Navigation::class)->findAll([], ['ID' => 'ASC']);

//                $this->addFlash(
//            'notice',
//            'Ваши изменения сохранены!'
//        );

//        print_r($navigation);
        return $this->render('base.html.twig', [
            'navigation'=>$navigation,
        ]);
    }

//    /**
//     * @Route ("/asd")
//     */
//    public function asd () : Response
//    {
//        return new Response("<h1>asdasdaa</h1>");
//    }
}