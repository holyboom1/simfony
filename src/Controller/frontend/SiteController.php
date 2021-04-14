<?php

namespace App\Controller\frontend;

use App\Entity\Aboutcompany;
use App\Entity\Blocks;
use App\Entity\Brands;
use App\Entity\Config;
use App\Entity\Equipment;
use App\Entity\Equipmentsubs;
use App\Entity\Feedback;
use App\Entity\Navigation;
use App\Entity\Requisites;
use App\Entity\Services;
use App\Entity\Slider;
use App\Entity\Solutions;
use App\Entity\Solutionsitems;
use App\Form\FeedbackType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

class SiteController extends AbstractController
{

    /**
     * @Route("/", name="main")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function index(Request $request): Response
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

        $fb = new Feedback();
        $form = $this->createForm(FeedbackType::class, $fb);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $fb->setCreateAt(new \DateTimeImmutable(date('Y-m-d H:i:s')));
            $em = $this->getDoctrine()->getManager();
            $em->persist($fb);
            $em->flush();
            unset($fb);
            unset($form);
            $fb = new Feedback();
            $form = $this->createForm(FeedbackType::class, $fb);

            return $this->redirect($request->getUri()) ;


        }
        return $this->render('frontend/base.html.twig', [
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


}