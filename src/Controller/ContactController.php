<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Mime\Message;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class); //à voir si on a déja des données
        $contact = $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            $email = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('portfolio@monsite.com')
                ->htmlTemplate('contact/message.html.twig')
                ->context([
                    'object' => $contact->get('email')->getData(),
                    'message' => $contact->get('message')->getData()
                ]);
            $mailer->send($email);

            $this->addFlash(
               'success',
               'Sent message! '
            );
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    /*$contact->get('firstname')->getData()
                    ->$contact->get('lastname')->getData()
                    ->*/
}
