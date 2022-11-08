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

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Request $request,
        EntityManagerInterface $em,
        MailerInterface $mailer,
        ParametersGenerauxRepository $param): Response
    {
        return $this->render('home/index.html.twig', [
            'param_g' => $param->find(1),
        ]);
    }

    #[Route('/confirm/{id}/{token}', name: 'app_confirm')]
    public function confirm(DiffusionNewsletter $diffusion, $token, EntityManagerInterface $em):Response
    {
        if($diffusion->getValidationToken() != $token){
            throw $this->createNotFoundException('Page non trouvée');
        }

        $diffusion->setIsValid(true);
        $em->persist($diffusion);
        $em->flush();

        $this->addFlash('success', 'Inscription validée');
        return $this->redirectToRoute('app_home');
    }

    #[Route('/unsubscribe/{id}/{token}', name: 'app_unsubscribe')]
    public function unsubscribe(DiffusionNewsletter $diffusion, $token):Response
    {
        if($diffusion->getValidationToken() != $token){
            throw $this->createNotFoundException('Page non trouvée');
        }

        $diffusion->setIsValid(false);
        $em = $this->$this->getDoctrine()->getManager();
        $em->persist($diffusion);
        $em->flush();

        $this->addFlash('success', 'Désinscription validée');
        return $this->redirectToRoute('app_home');
    }


    public function paramsG(Request $request,
                          EntityManagerInterface $em,
                          ParametersGenerauxRepository $param): Response
    {
        return $this->render('base.html.twig', [
            'param_g' => $param->find(1),
        ]);
    }


}
