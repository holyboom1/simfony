<?php


namespace App\Controller;


use App\Entity\Config;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{

//    private $mailer;

//    public $mail;
//
////    public function __construct()
////    {
////        $this->mailer = $mailer;
////    }
//
//    public function Go ($text = "asdadsssss"){
//        $this->mail = $text;
//        $this->sendEmail();
//    }

    public function index($name, \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('send@example.com')
            ->setTo('recipient@example.com')
            ->setBody(
//                $this->renderView(
//                // templates/emails/registration.html.twig
//                    'emails/registration.html.twig',
//                    ['name' => $name]
//                ),
                'text/html '.$name.'', 'text/html'
            )
//
//            // you can remove the following code if you don't define a text version for your emails
//            ->addPart(
//                $this->renderView(
//                // templates/emails/registration.txt.twig
//                    'emails/registration.txt.twig',
//                    ['name' => $name]
//                ),
//                'text/plain'
//            )
        ;

        $mailer->send($message);

       return new Response("email send");
    }
}