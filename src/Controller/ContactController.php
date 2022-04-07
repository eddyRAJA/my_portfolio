<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Message;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContactController extends AbstractController
{
    private $em;
    private $contactRepo;
   
    public function __construct(EntityManagerInterface $em, ContactRepository $contactRepo)
    {
        $this->em = $em;
        $this->ContactRepository = $contactRepo;
    }

    /**
     * @Route("/contact", name="app_contact")
     */
    public function registerMessage(Request $request, EntityManagerInterface $em, MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) { 
            
            $em->persist($contact);
            $em->flush();

        $email = (new TemplatedEmail())
            ->from($contact->getEmail('email'))
            ->to('portfolio@monsite.com')
            ->htmlTemplate('contact/message.html.twig')
            ->context([
                'object' => $contact->getEmail('email'),
                'message' => $contact->getMessage('message')
            ]);
        $mailer->send($email);

        $this->addFlash('success', 'Sent message!');
        return $this->redirectToRoute('app_home');
        }
        
        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
