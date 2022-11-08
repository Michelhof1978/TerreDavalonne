<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ParametersGenerauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactUsController extends AbstractController
{
    #[Route('/contact/us', name: 'app_contact_us',)]
    public function index(Request $request, MailerInterface $mailer, ParametersGenerauxRepository $param): Response
    {
        $contact = new Contact();
        
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $theme = $contact->getTheme();

            $message = (new Email())
                ->from($contact->getEmail())
                ->to($theme->getEmail())
                ->subject('vous avez reçu un email')
                ->text(
                    'Sender : ' . $contact->getEmail() . \PHP_EOL .
                        $contact->getMessage(),
                    'text/plain'
                );
            $mailer->send($message);

            $this->addFlash('success', 'Vore message a été envoyé');

            return $this->redirectToRoute('app_home');
        }

        return $this->render('contact_us/index.html.twig', [
            "form" => $form->createView(),
            'param_g' => $param->find(1),
        ]);
    }
}
