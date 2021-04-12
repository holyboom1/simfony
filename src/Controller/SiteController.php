<?php

namespace App\Controller;

use App\Entity\Aboutcompany;
use App\Entity\Blocks;
use App\Entity\Brands;
use App\Entity\Config;
use App\Entity\Equipment;
use App\Entity\Equipmentsubs;
use App\Entity\Navigation;
use App\Entity\Requisites;
use App\Entity\Services;
use App\Entity\Slider;
use App\Entity\Solutions;
use App\Entity\Solutionsitems;
use App\Form\Feedback;
use App\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{

    /**
     * @Route ("/")
     */
    public function index(): Response
    {

        $navigation = $this->getDoctrine()->getRepository(Navigation::class)->findBY(["lang" => "ru"], ['position' => 'ASC']);
        $block1 = $this->getDoctrine()->getRepository(Blocks::class)->findOneBy(["position" => 1], []);
        $block2 = $this->getDoctrine()->getRepository(Blocks::class)->findOneBy(["position" => 2], []);
        $aboutCompany = $this->getDoctrine()->getRepository(Aboutcompany::class)->findBy(["lang" => "ru"], ['position' => 'ASC']);
        $slider = $this->getDoctrine()->getRepository(Slider::class)->findBy(["lang" => "ru"], []);
        $services = $this->getDoctrine()->getRepository(Services::class)->findBy(["lang" => "ru"], ['position' => 'ASC']);
        $solutions = $this->getDoctrine()->getRepository(Solutions::class)->findBy(["lang" => "ru"], ['position' => 'ASC']);
        $brands = $this->getDoctrine()->getRepository(Brands::class)->findBy([], ['position' => 'ASC']);
        for ($i = 0; $i < count($solutions); $i++) {
            $solutions[$i]->items = $this->getDoctrine()->getRepository(Solutionsitems::class)->findBy(['mainname' => $solutions[$i]->getMainname()], ['position' => 'ASC']);
        };
        $config = $this->getDoctrine()->getRepository(Config::class)->findOneBy(['lang' => 'ru'], []);
        $req = $this->getDoctrine()->getRepository(Requisites::class)->findBy(['lang' => 'ru'], []);

        $enq = $this->getDoctrine()->getRepository(Equipment::class)->findBy(['lang' => 'ru'], []);
        for ($i = 0; $i < count($enq); $i++) {
            if ($enq[$i]->getSubtext()) {
                $enq[$i]->subs = $this->getDoctrine()->getRepository(Equipmentsubs::class)->findBy(['mainname' => $enq[$i]->getText(), 'lang' => 'ru']);
            }
        };
//        print_r($enq);
//
//                $this->addFlash(
//            'notice',
//            'Ваши изменения сохранены!'
//        );
//        $feedback = new \App\Entity\Feedback();
        $form = $this->createForm(FeedbackType::class);
//        $form->handleRequest($request);


        return $this->render('base.html.twig', [
            'navigation' => $navigation,
            'block1' => $block1,
            'block2' => $block2,
            'aboutCompany' => $aboutCompany,
            'slider' => $slider,
            'services' => $services,
            'solutions' => $solutions,
            'brands' => $brands,
            'config' => $config,
            'req' => $req,
            'enq' => $enq,
            'form' => $form->createView()


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