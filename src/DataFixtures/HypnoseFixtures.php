<?php

namespace App\DataFixtures;

use App\Entity\Hypnose;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class HypnoseFixtures extends Fixture implements DependentFixtureInterface
{
  const HYPNOSES = [
    [
      "description" => '<h2>Qu&#39;est-ce que l&#39;hypnose ?</h2>

      <p>&nbsp;</p>
      
      <p><img alt="hypnose" class="align-center" src="https://www.elsan.care/sites/default/files/inline-images/GettyImages-1126063643.jpg" /></p>
      
      <p>&nbsp;</p>
      
      <p>ll existe diff&eacute;rents types d&rsquo;hypnose (hypnose&nbsp;de spectacle, humaniste, Ericksonienne). Celle pratiqu&eacute;e &agrave; la Clinique du Parc est de l&rsquo;hypnose&nbsp;Ericksonienne et m&eacute;dicale et&nbsp;rentre donc&nbsp;dans le cadre d&rsquo;une prise en charge soignante. Elle est pratiqu&eacute;e par une infirmi&egrave;re dipl&ocirc;m&eacute;e en hypnose m&eacute;dicale et th&eacute;rapeutique.&nbsp;Il s&rsquo;agit d&rsquo;un&nbsp;soin &agrave; part enti&egrave;re et d&rsquo;une fa&ccedil;on de soigner autrement.</p>
      
      <h3>Un processus naturel</h3>
      
      <p>L&rsquo;hypnose est d&rsquo;abord un processus naturel.&nbsp;Chacun d&rsquo;entre nous en a d&eacute;j&agrave; fait l&rsquo;exp&eacute;rience, comme par exemple lorsque vous &ecirc;tes &laquo;&nbsp;ailleurs&nbsp;&raquo; ou &laquo;&nbsp;dans la lune&nbsp;&raquo; et que vous n&rsquo;avez pas vu les 5 minutes pass&eacute;s car vous &ecirc;tes absorb&eacute; par vos pens&eacute;es et &ecirc;tes alors surpris d&rsquo;&ecirc;tre d&eacute;j&agrave; arriv&eacute; &agrave; destination !&nbsp;Durant cet instant nous sommes comme dissoci&eacute;s, une partie de nous reste parfaitement &eacute;veill&eacute;e et pleinement consciente pendant qu&rsquo;une autre partie peut s&rsquo;absorber dans quelque chose de totalement diff&eacute;rent.</p>
      
      <p>On se coupe alors du mental, des pens&eacute;es ce qui induit&nbsp;un l&acirc;cher prise qui nous&nbsp;permet d&rsquo;acc&eacute;der &agrave; des ressources &nbsp;dont b&eacute;n&eacute;ficient &agrave; la fois le corps et l&rsquo;esprit. Ainsi&nbsp;l&rsquo;hypnose est un autre&nbsp;mode de fonctionnement&nbsp;du cerveau.</p>
      
      <p>L&rsquo;hypnoth&eacute;rapeute accompagne le patient et l&rsquo;aide &agrave; trouver des ressources &agrave; l&rsquo;int&eacute;rieur de lui, &agrave; constituer une boite &agrave; outils pour qu&rsquo;il puisse s&rsquo;autonomiser et pratiquer ensuite l&rsquo;auto-hypnose. L&rsquo;objectif est qu&rsquo;il puisse apprendre &agrave; g&eacute;rer ses douleurs, son anxi&eacute;t&eacute; ou autre probl&egrave;me et trouver des solutions qui lui permettent de &laquo;&nbsp;reprendre le contr&ocirc;le&nbsp;&raquo; ou faire face &agrave; la situation<strong>.&nbsp;&nbsp;</strong></p>
      
      <h4>Comment se d&eacute;roule une s&eacute;ance ?</h4>
      
      <p>Une s&eacute;ance d&eacute;bute toujours par une rencontre, un &eacute;change fondamental pour recueillir les attentes du patient&nbsp;et&nbsp;connaitre la situation. C&rsquo;est ce qu&rsquo;on appelle l&rsquo;anamn&egrave;se qui est indispensable pour pouvoir comprendre les&nbsp;probl&eacute;matiques&nbsp;et mettre en place une r&eacute;ponse adapt&eacute;e.&nbsp;Ensuite le patient est accompagn&eacute; dans un bon souvenir par exemple, quelque chose&nbsp; d&rsquo;agr&eacute;able, &agrave; son rythme, afin d&rsquo;obtenir le l&acirc;cher prise lui&nbsp;permettant d&rsquo;exploiter toutes les ressources b&eacute;n&eacute;fiques de ce moment, celles qui sont utiles et efficaces pour faire face aux diff&eacute;rentes situations (douleur, stress, fatigue&hellip;). Ce n&rsquo;est pas un &eacute;tat. Le patient&nbsp;ne dort&nbsp;pas et continue &agrave; entendre les bruits autour.</p>
      
      <h4>A qui s&rsquo;adresse l&rsquo;hypnose ?</h4>
      
      <p>L&rsquo;hypnose s&rsquo;adresse &agrave; toute personne d&eacute;sirant am&eacute;liorer une situation difficile, gagner en confort physique et psychique et trouver des solutions.</p>
      
      <p>La demande de consultation est une d&eacute;marche personnelle ou peut &ecirc;tre recommand&eacute;e par un m&eacute;decin ou par un proche.</p>
      
      <h4>Que permettent les consultations d&#39;hypnose ?</h4>
      
      <p><strong>Acquisition d&rsquo;outils utiles pour :</strong></p>
      
      <ul>
        <li>Gestion de la douleur​ ​aigue ou chronique, d&rsquo;une g&ecirc;ne, d&rsquo;un inconfort</li>
        <li>Gestion du stress, anxi&eacute;t&eacute;, angoisse, &eacute;tats d&eacute;pressifs</li>
        <li>Pr&eacute;paration d&rsquo;une intervention chirurgicale, d&rsquo;un soin (dentaire ou autre), d&rsquo;un examen (IRM, Baccalaur&eacute;at &hellip;)</li>
      </ul>
      
      <p><strong>Accompagnement :</strong></p>
      
      <ul>
        <li>dans un contexte de maladie&nbsp;aigu&euml;&nbsp;ou&nbsp;chronique (migraines,&nbsp;colopathies,&nbsp;cancer&hellip;)</li>
        <li>de la r&eacute;&eacute;ducation ou post-soin</li>
        <li>dans les troubles du sommeil</li>
        <li>au sevrage tabagique, perte de poids&hellip;</li>
        <li>d&rsquo;un autre probl&egrave;me (traumatisme, phobie, peurs, confiance en soi, burn-out&hellip;)</li>
        <li>ou accompagnement global</li>
      </ul>
      
      <p><strong>Apprentissage de l&rsquo;auto-hypnose</strong></p>',
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::HYPNOSES as $key => $hypnose) {
      $description = $hypnose['description'];
      $newHypnose = new Hypnose();
      $newHypnose->setDescription($description);
      $manager->persist($newHypnose);
      $this->addReference('hypnose_' . ($key + 1), $newHypnose);
    }

    $manager->flush();
  }

  public function getDependencies()
  {
    return [
      ElementBaseFixtures::class,
      ElementPhytoFixtures::class,
      ElementSabbatFixtures::class,
      RecetteTypeFixtures::class,
      ProfessionFixtures::class,
      StatutOrderFixtures::class,
      TypeRecueilFixtures::class,
      TypeAdresseFixtures::class,
      CategoryFixtures::class,
      FAQFixtures::class,
      TypeFixtures::class,
      CoachingVideoFixtures::class,
      FormationNumericFixtures::class,
      EvenementFixtures::class,
      TypeOptionFixtures::class,
      ProductFixtures::class,
      PromotionFixtures::class,
      StockFixtures::class,
      PageFixtures::class,
      TypeBlocFixtures::class,
      ConfigBlocFixtures::class,
      SectionFixtures::class,
      BlocContentFixtures::class,
      BlocContentAttachementFixtures::class,
      UserFixtures::class,
      CommandeFixtures::class,
      OrderLigneFixtures::class,
      GoldBookFixtures::class,
      CommentFixtures::class,
      ConditionGDVFixtures::class,
    ];
  }
}
