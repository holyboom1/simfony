<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{

    /**
     *   * @Route("/{name}")
     *  */

    public function index($name)
    {
        return $this->render("default/index.html.twig",['name' => $name]);
    }


}