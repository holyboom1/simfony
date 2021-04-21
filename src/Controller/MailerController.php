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

    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

//    public function sendEmail($to, $subject, $texto) {
//        $message = (new \Swift_Message($subject))
//            ->setFrom('juanitourquiza@gmail.com')
//            ->setTo($to)
//            ->setBody(($texto),'text/html');
//        return $this->mailer->send($message);
//    }
//}

//    /**
//     * @Route("/email")
//     */
    public function sendEmail( $text  )
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
//        var_dump($request);
        $email = (new Email())
            ->from('weqwe@qweqw.com')
            ->to('asdads@asd.com')
            ->subject('asdasd')
            ->html('<p>'.$text.'</p>');

        $this->mailer->send($email);


    }
}