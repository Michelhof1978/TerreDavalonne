<?php

namespace App\Controller\Admin;

use App\Entity\BlocContent;
use App\Entity\BlocContentAttachement;
use App\Entity\Commande;
use App\Entity\Comment;
use App\Entity\ConditionGenDeVente;
use App\Entity\ConseilDuNaturo;
use App\Entity\CreneauCoatching;
use App\Entity\Evenement;
use App\Entity\FAQ;
use App\Entity\FAQCoaching;
use App\Entity\FormationNumeric;
use App\Entity\GoldBook;
use App\Entity\Hypnose;
use App\Entity\PlanteImage;
use App\Entity\MagieVerte;
use App\Entity\Newsletter;
use App\Entity\Page;
use App\Entity\ParametersGeneraux;
use App\Entity\PolitiqueConf;
use App\Entity\User;
use App\Entity\QuiSommesNous;
use App\Entity\MentionLegale;
use App\Entity\Plante;
use App\Entity\PlanteOption;
use App\Entity\Recueil;
use App\Entity\Product;
use App\Entity\Recette;
use App\Entity\Section;
use App\Entity\ThemeContactezNous;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator as RouterAdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    private RouterAdminUrlGenerator $adminUrlGenerator;

    public function __construct(RouterAdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($this->adminUrlGenerator->setController(CommandeCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Terredavalonne');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);

        yield MenuItem::linkToUrl('retour au site web', 'fa fa-return', '/');
        yield MenuItem::section('Coaching');
        yield MenuItem::subMenu('Gestion Coaching', 'fa fa-article')->setSubItems([
            MenuItem::linkToCrud('Liste des créneaux', 'fa fa-creneau-coaching', CreneauCoatching::class),
            MenuItem::linkToCrud('Création d\'un créneaux', 'fa fa-creneau-coaching', CreneauCoatching::class)
                ->setAction('new'),
            MenuItem::linkToCrud('Gestion des FAQ pour le coaching', 'fa fa-question', FAQCoaching::class),
        ]);
        yield MenuItem::section('Evénement');
        yield MenuItem::subMenu('Gestion Evenement', 'fa fa-evenement')->setSubItems([
            MenuItem::linkToCrud('Liste des événements', 'fa fa-evenement', Evenement::class),
            MenuItem::linkToCrud('Création d\'un événement', 'fa fa-evenement', Evenement::class)
                ->setAction('new'),
        ]);
        yield MenuItem::section('Newsletters');
        yield MenuItem::subMenu('Gestion Newsletter', 'fa fa-newsletter')->setSubItems([
            MenuItem::linkToCrud('Liste des newsletter', 'fa fa-newsletter', Newsletter::class),
            MenuItem::linkToCrud('Création d\'une newsletter', 'fa fa-newsletter', Newsletter::class)
                ->setAction('new'),
        ]);
        yield MenuItem::section('Commandes');
        yield MenuItem::subMenu('Gestion des commandes', 'fa fa-commande')->setSubItems([
            MenuItem::linkToCrud('Liste des commandes', 'fa fa-commande', Commande::class),
        ]);
        yield MenuItem::section('Contenu');
        yield MenuItem::subMenu('Gestion du contenu', 'fa fa-contenu')->setSubItems([
            MenuItem::linkToCrud('Liste des pages', 'fa fa-contenu', Page::class),
            MenuItem::linkToCrud('Liste des sections', 'fa fa-section', Section::class),
            MenuItem::linkToCrud('Liste des contenus', 'fa fa-contenu', BlocContent::class),
            MenuItem::linkToCrud('Liste des contenus attachés', 'fa fa-contenu', BlocContentAttachement::class),
        ]);
        yield MenuItem::section('FAQ');
        yield MenuItem::subMenu('Gestion des FAQ', 'fa fa-faq')->setSubItems([
            MenuItem::linkToCrud('Liste des FAQS', 'fa fa-faq', FAQ::class),
            MenuItem::linkToCrud('Création d\'une FAQ', 'fa fa-faq', FAQ::class)
                ->setAction('new'),
        ]);
        yield MenuItem::section('Utilisateur');
        yield MenuItem::subMenu('Gestion des utilisateurs', 'fa fa-utilisateur')->setSubItems([
            MenuItem::linkToCrud('Liste des utilisateurs', 'fa fa-utilisateur', User::class),
            MenuItem::linkToCrud('Création d\'un nouvel administrateur', 'fa fa-utilisateur', User::class)
                ->setAction('new'),
        ]);
        yield MenuItem::section('Qui sommes nous ?');
        yield MenuItem::subMenu('Gestion de qui sommes-nous ?')->setSubItems([
            MenuItem::linkToCrud('Liste Qui sommes nous ?', 'fa fa-quiSommesNous', QuiSommesNous::class),
            MenuItem::linkToCrud('Création Qui sommes nous ?', 'fa fa-quiSommesNous', QuiSommesNous::class)
                ->setAction('new'),
        ]);
        yield MenuItem::section('Mentions légales');
        yield MenuItem::subMenu('Gestion des mentions légales')->setSubItems([
            MenuItem::linkToCrud('Liste des mentions légales', 'fa fa-mention', MentionLegale::class),
            MenuItem::linkToCrud('Création d\'une nouvelle mention légale', 'fa fa-mention', MentionLegale::class)
        ]);
        yield MenuItem::section('Condition générale de vente');
        yield MenuItem::subMenu('Gestion des conditions générales de vente')->setSubItems([
            MenuItem::linkToCrud('Liste des conditions générales de vente', 'fa fa-condition', ConditionGenDeVente::class),
            MenuItem::linkToCrud('Création d\'une nouvelle condition générale de vente', 'fa fa-condition', ConditionGenDeVente::class)
        ]);
        yield MenuItem::section('Politique de confidentialité');
        yield MenuItem::subMenu('Gestion de la politique de confidentialité')->setSubItems([
            MenuItem::linkToCrud('Liste des politiques de confidencialité', 'fa fa-politique', PolitiqueConf::class),
            MenuItem::linkToCrud('Création d\'une nouvelle politique de confidentialité', 'fa fa-politique', PolitiqueConf::class)
                ->setAction('new'),
        ]);
        yield MenuItem::section('Thème contactez-nous');
        yield MenuItem::subMenu('Gestion des thèmes de contact')->setSubItems([
            MenuItem::linkToCrud('Liste des thèmes pour nous contacter', 'fa fa-theme', ThemeContactezNous::class),
            MenuItem::linkToCrud('Création d\'un nouveau thème de prise de contacter', 'fa fa-theme', ThemeContactezNous::class)
                ->setAction('new'),
        ]);
        yield MenuItem::section('Répondre aux utilisateurs');
        yield MenuItem::subMenu('Gestion du livre d\'or')->setSubItems([
            MenuItem::linkToCrud('Consultation des mots du livre', 'fa fa-book', GoldBook::class),
            /*MenuItem::linkToCrud('Création d\'une réponse', 'fa fa-reponse', ReponseGoldBook::class)*/
        ]);
        yield MenuItem::subMenu('Gestion des commentaires')->setSubItems([
            MenuItem::linkToCrud('Consultation des commentaires', 'fa fa-book', Comment::class),
        ]);
        yield MenuItem::section('Conseil du Naturo');
        yield MenuItem::subMenu('Gestion des conseils du Naturo')->setSubItems([
            MenuItem::linkToCrud('Liste des conseils du Naturo', 'fa fa-conseil', ConseilDuNaturo::class),
            MenuItem::linkToCrud('Création d\'un nouveau conseil', 'fa fa-conseil', ConseilDuNaturo::class)
        ]);
        yield MenuItem::section('Hypnose');
        yield MenuItem::subMenu('Gestion du contenu hypnose')->setSubItems([
            MenuItem::linkToCrud('Liste des pages hypnoses', 'fa fa-hypnose', Hypnose::class),
            MenuItem::linkToCrud('Création d\'un nouveau contenu hypnose', 'fa fa-hypnose', Hypnose::class)
        ]);
        yield MenuItem::section('Dico et histoire botanique');
        yield MenuItem::subMenu('Gestion du dictionnaire et histoire botanique')->setSubItems([
            MenuItem::linkToCrud('Liste contenu du dictionnaire et histoire botanique', 'fa fa-dico', Recueil::class),
            MenuItem::linkToCrud('Création d\'un nouvel élément', 'fa fa-dico', Recueil::class)
        ]);
        yield MenuItem::section(('Formation numérisée'));
        yield MenuItem::subMenu('Gestion des formations numérisées')->setSubItems([
            MenuItem::linkToCrud('Liste des formations numérisées', 'fa fa-formation', FormationNumeric::class),
            MenuItem::linkToCrud('Création d\'une nouvelle formation numérique', 'fa fa-formation', FormationNumeric::class)
        ]);
        yield MenuItem::section('les plantes');
        yield MenuItem::subMenu('Gestion des plantes')->setSubItems([
            MenuItem::linkToCrud('Liste des plantes', 'fa fa-list', Plante::class),
            MenuItem::linkToCrud('Création d\'une nouvelle plante', 'fa fa-ajout', Plante::class)
                ->setAction('new'),
            MenuItem::linkToCrud('ajouter une photo à une plante', 'fa fa-added', PlanteImage::class)
                ->setAction('new'),
            MenuItem::linkToCrud('Liste des contenus des plantes', 'fa fa-list', PlanteOption::class)
        ]);
        yield MenuItem::section('les produits');
        yield MenuItem::subMenu('Gestion des produits')->setSubItems([
            MenuItem::linkToCrud('Liste des produits', 'fa fa-produit', Product::class),
            MenuItem::linkToCrud('Création d\'un nouveau produit', 'fa fa-produit', Product::class)
                ->setAction('new'),
        ]);
        yield MenuItem::section('les recettes');
        yield MenuItem::subMenu('Gestion des recettes')->setSubItems([
            MenuItem::linkToCrud('Liste des recettes', 'fa fa-recette', Recette::class),
            MenuItem::linkToCrud('Création d\'une nouvelle recette', 'fa fa-recette', Recette::class)
        ]);
        yield MenuItem::section('la Magie Verte');
        yield MenuItem::subMenu('Gestion de la Magie Verte')->setSubItems([
            MenuItem::linkToCrud('Liste des Magies Vertes', 'fa fa-magie', MagieVerte::class),
            MenuItem::linkToCrud('Création d\'une nouvelle Magie Verte', 'fa fa-magie', MagieVerte::class)
                ->setAction('new'),
        ]);
        yield MenuItem::section('paramètres généraux');
        yield MenuItem::subMenu('Gestion des paramètres généraux')->setSubItems([
            MenuItem::linkToCrud('Mettre à jour les paramètres généraux', 'fa fa-update', ParametersGeneraux::class)
                ->setAction('edit')
                ->setEntityId(1),
        ]);
    }
}
