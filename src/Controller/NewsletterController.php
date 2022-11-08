<?php

namespace App\Controller;

use App\Entity\DiffusionNewsletter;
use App\Form\DiffusionNewsletterType;
use App\Repository\ParametersGenerauxRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    #[Route('/newsletter', name: 'app_newsletter')]
    public function index(Request $request,
                          EntityManagerInterface $em,
                          MailerInterface $mailer,
                          ParametersGenerauxRepository $param): Response
    {
        $diffusion = new DiffusionNewsletter();
        $form = $this->createForm(DiffusionNewsletterType::class, $diffusion);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $token = hash('sha256', uniqid());
            $diffusion->setCreatedAt(new DateTimeImmutable());
            $diffusion->setIsValid(false);
            $diffusion->setValidationToken($token);
            $em->persist($diffusion);
            $em->flush();
            $email = (new TemplatedEmail())
                ->from(new Address('erik@terredavalonne.com', 'Terre d\'Avalonne'))
                ->to(new Address($diffusion->getEmail()))
                ->subject('Inscription à la newsletter Terre D\'Avalonne')
                ->htmlTemplate('MAILS/NEWSLETTER/NewsletterConfirm.html.twig')
                ->context(compact('diffusion', 'token'));
            $mailer->send($email);

            $this->addFlash('success', 'Inscription en attente de validation');
            return $this->redirectToRoute('app_home');
        }
        return $this->render('newsletter/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
