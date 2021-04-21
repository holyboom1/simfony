<?php


namespace App\Controller;


use App\Entity\Config;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{

    public $mail;

//    /**
//     * @Route("/email")
//     */
    public function sendEmail(MailerInterface $mailer )
    {

//        $em = $this->getDoctrine()->getRepository(Config::class)->findOneBy(['lang'=>'ru'])->getAdminEmail();
//        $email = (new TemplatedEmail())
//            ->from($em)
//            ->to('you@example.com')
//            //->cc('cc@example.com')
//            //->bcc('bcc@example.com')
//            //->replyTo('fabien@example.com')
//            //->priority(Email::PRIORITY_HIGH)
//            ->subject('Time for Symfony Mailer!')
//            ->text('Sending emails is fun again!')
//            ->htmlTemplate('mail/email.html.twig');
//
//        $mailer->send($email);

        print_r($this->mail);
        $email = (new Email())
            ->from('weqwe@qweqw.com')
            ->to('asdads@asd.com')
            ->subject('asdasd')
            ->html('<p>asdasd</p>');

        $mailer->send($email);


        return new Response("email send");

        // ...
    }
}