<?php

namespace App\DataFixtures;

use App\Entity\ConditionGenDeVente;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ConditionGDVFixtures extends Fixture implements DependentFixtureInterface
{
  const CONDITIONS = [
    [
      "description" => '<div class="block block-core block-page-title-block" id="block-economie-page-title">
      <h1>Conditions g&eacute;n&eacute;rales de vente</h1>
      </div>
      
      <div class="block block-system block-system-main-block" id="block-economie-content">
      <div class="article--infos">08/11/2019</div>
      
      <div class="node__content">
      <div class="clearfix field field--label-hidden field--name-field-chapo field--type-text-long field__item text-formatted">
      <p>Les conditions g&eacute;n&eacute;rales de vente encadrent les relations commerciales. Elles figurent dans les documents contractuels. Les CGV diff&egrave;rent en fonction des types de prestations que vous offrez et des types de clients auxquels vous vous adressez. Que devez-vous savoir&nbsp;? Comment sont-elles encadr&eacute;es&nbsp;?</p>
      </div>
      
      <div class="article--image">
      <div class="field field--label-hidden field--name-field-image-contenu field--type-image field__item"><img alt="" class="image-style-image-contenu-article-espace" src="https://www.economie.gouv.fr/files/styles/image_contenu_article_espace/public/files/directions_services/dgccrf/imgs/fiches_pratiques/2019/conditions-generales-ventes.jpg?itok=7d9q3akw" style="height:320px; width:550px" /></div>
      
      <div class="field field--label-hidden field--name-field-legende field--type-string field__item">&copy;Pixabay</div>
      </div>
      
      <div class="field field--label-hidden field--name-field-paragraphes field--type-entity-reference-revisions field__items">
      <div class="field__item">
      <div class="paragraph paragraph--type--contenu-libre paragraph--view-mode--default">
      <div class="clearfix field field--label-hidden field--name-field-contenu-libre field--type-text-long field__item text-formatted">
      <p><a class="pdf" href="https://www.economie.gouv.fr/files/files/directions_services/dgccrf/documentation/fiches_pratiques/fiches/conditions-generales-de-vente.pdf?v=1640013354" target="_blank">Conditions g&eacute;n&eacute;rales de vente</a> - PDF,&nbsp; 361 Ko</p>
      
      <p>Il s&#39;agit ici des conditions g&eacute;n&eacute;rales de vente (CGV) entre professionnels. Elles constituent le socle unique de la n&eacute;gociation commerciale et peuvent &ecirc;tre diff&eacute;renci&eacute;es selon les cat&eacute;gories d&#39;acheteurs. Lorsqu&#39;elles sont formalis&eacute;es, elles doivent comporter certaines mentions obligatoires. Elles doivent &ecirc;tre communiqu&eacute;es &agrave; tout acheteur professionnel qui en fait la demande.</p>
      
      <h2>Les mentions obligatoires des conditions g&eacute;n&eacute;rales de vente</h2>
      
      <p>Les conditions g&eacute;n&eacute;rales de vente sont d&eacute;finies au I de l&#39;article L. 441-1 du Code de commerce.<br />
      Elles comprennent obligatoirement :</p>
      
      <ul>
        <li>les conditions de r&egrave;glement&nbsp;;</li>
        <li>les &eacute;l&eacute;ments de d&eacute;termination du prix tels que le bar&egrave;me des prix unitaires et les &eacute;ventuelles r&eacute;ductions de prix.</li>
      </ul>
      
      <h3>Pr&eacute;cisions sur les conditions de r&egrave;glement</h3>
      
      <p>Conform&eacute;ment au II de l&rsquo;article L. 441-10 du Code de commerce, les conditions de r&egrave;glement doivent obligatoirement pr&eacute;ciser les conditions d&#39;application et le taux d&#39;int&eacute;r&ecirc;t des p&eacute;nalit&eacute;s de retard exigibles le jour suivant la date de r&egrave;glement figurant sur la facture ainsi que le montant de l&rsquo;indemnit&eacute; forfaitaire pour les frais de recouvrement due au cr&eacute;ancier dans le cas o&ugrave; les sommes dues sont r&eacute;gl&eacute;es apr&egrave;s cette date. Sauf disposition contraire qui ne peut toutefois fixer un taux inf&eacute;rieur &agrave; trois fois le taux d&#39;int&eacute;r&ecirc;t l&eacute;gal, ce taux est &eacute;gal au taux d&#39;int&eacute;r&ecirc;t appliqu&eacute; par la Banque centrale europ&eacute;enne &agrave; son op&eacute;ration de refinancement la plus r&eacute;cente major&eacute; de 10 points de pourcentage. Les p&eacute;nalit&eacute;s de retard sont exigibles sans qu&#39;un rappel soit n&eacute;cessaire.</p>
      
      <p>L&rsquo;indemnit&eacute; forfaitaire pour frais de recouvrement, dont le montant est fix&eacute; &agrave; 40 euros, est due de plein droit &agrave; son cr&eacute;ancier par tout professionnel en situation de retard de paiement. Lorsque les frais de recouvrement expos&eacute;s sont sup&eacute;rieurs au montant de cette indemnit&eacute; forfaitaire, le cr&eacute;ancier peut demander une indemnisation compl&eacute;mentaire sur justification. Le cr&eacute;ancier ne peut toutefois pas invoquer le b&eacute;n&eacute;fice de ces indemnit&eacute;s lorsque l&rsquo;ouverture d&rsquo;une proc&eacute;dure de sauvegarde, de redressement ou de liquidation judiciaire interdit le paiement &agrave; son &eacute;ch&eacute;ance de la cr&eacute;ance qui lui est due.</p>
      
      <p>En application des b) et c) de l&rsquo;article L. 441-16 du Code de commerce, encourt une amende administrative, d&rsquo;un montant maximal de 75&deg;000&deg;euros pour une personne physique et de deux millions d&rsquo;euros pour une personne morale, le professionnel qui n&#39;indiquerait pas dans les conditions de r&egrave;glement, les conditions d&#39;application et le taux d&#39;int&eacute;r&ecirc;t des p&eacute;nalit&eacute;s de retard ainsi que le montant de l&#39;indemnit&eacute; forfaitaire pour frais de recouvrement ou qui fixerait un taux ou des conditions d&#39;exigibilit&eacute; des p&eacute;nalit&eacute;s de retard non conformes aux prescriptions pr&eacute;cis&eacute;es ci-dessus. Le montant de l&rsquo;amende encourue est doubl&eacute; en cas de r&eacute;it&eacute;ration du manquement dans un d&eacute;lai de deux ans &agrave; compter de la date &agrave; laquelle la premi&egrave;re d&eacute;cision de sanction est devenue d&eacute;finitive.</p>
      
      <h3>Cas particulier des produits agricoles ou des produits alimentaires comportant un ou plusieurs produits agricoles</h3>
      
      <p>Conform&eacute;ment au I de l&rsquo;article L. 443-4 du Code de commerce, les conditions g&eacute;n&eacute;rales de vente relatives &agrave; des produits agricoles ou &agrave; des produits alimentaires comportant un ou plusieurs produits agricoles doivent faire r&eacute;f&eacute;rence aux indicateurs &eacute;num&eacute;r&eacute;s au neuvi&egrave;me alin&eacute;a du III de l&rsquo;article L. 631-24 et aux articles L. 631-24-1 et L. 631-24-3 du Code rural et de la p&ecirc;che maritime ou, le cas &eacute;ch&eacute;ant, &agrave; tous autres indicateurs disponibles dont ceux &eacute;tablis par l&rsquo;observatoire de la formation des prix et des marges des produits alimentaires, lorsque de tels indicateurs existent.</p>
      
      <p>Ces conditions g&eacute;n&eacute;rales de vente doivent &eacute;galement expliciter les conditions dans lesquelles il est tenu compte de ces indicateurs pour la d&eacute;termination des prix.</p>
      
      <p>En application du II de l&rsquo;article L. 443-4 du Code de commerce, tout manquement &agrave; ces dispositions est passible d&rsquo;une amende administrative d&rsquo;un montant maximal de 75&nbsp;000 &euro; pour une personne physique et de 375&nbsp;000 &euro; pour une personne morale.</p>
      
      <p>Le montant de l&rsquo;amende encoure est doubl&eacute; en cas de r&eacute;it&eacute;ration du manquement dans un d&eacute;lai de deux ans &agrave; compter de la date &agrave; laquelle la premi&egrave;re d&eacute;cision de sanction est devenue d&eacute;finitive.</p>
      
      <h2>La communication des conditions g&eacute;n&eacute;rales de vente</h2>
      
      <p>L&#39;information pr&eacute;contractuelle est organis&eacute;e par le II de l&#39;article L. 441-1 du Code de commerce qui fait obligation &agrave; toute personne exer&ccedil;ant des activit&eacute;s de production, de distribution ou de services qui &eacute;tablit des conditions g&eacute;n&eacute;rales de vente de les communiquer &agrave; tout acheteur qui en fait la demande pour une activit&eacute; professionnelle. Cette communication s&#39;effectue par tout moyen constituant un support durable.</p>
      
      <p>Les conditions g&eacute;n&eacute;rales de vente peuvent &ecirc;tre diff&eacute;renci&eacute;es selon les cat&eacute;gories d&#39;acheteurs de produits ou de demandeurs de prestation de services (par exemple, d&eacute;taillants, grossistes). Dans ce cas, l&#39;obligation de communication ne s&#39;applique qu&#39;&agrave; l&#39;&eacute;gard des acheteurs de produits ou des demandeurs de prestations de services d&#39;une m&ecirc;me cat&eacute;gorie. Les conditions g&eacute;n&eacute;rales de vente constituant le socle unique de la n&eacute;gociation commerciale, tout producteur, prestataire de services, grossiste ou importateur peut, par ailleurs, dans le cadre de cette n&eacute;gociation convenir avec un acheteur de produits ou un demandeur de prestation de services des conditions particuli&egrave;res de vente qui ne sont pas soumises &agrave; cette obligation de communication.</p>
      
      <p>En application du IV de l&rsquo;article L. 441-1 du Code de commerce, le refus de communiquer des CGV existantes &agrave; tout acheteur qui en fait la demande pour une activit&eacute; professionnelle est passible d&rsquo;une amende administrative d&rsquo;un montant maximal de 15&deg;000 &euro; pour une personne physique et de 75&nbsp;000 &euro; pour une personne morale.</p>
      
      <p><em>Les &eacute;l&eacute;ments ci-dessus sont donn&eacute;s &agrave; titre d&#39;information. Ils ne sont pas forc&eacute;ment exhaustifs et ne sauraient se substituer aux textes officiels.</em></p>
      
      <p><img alt="" class="acti align-center amb-0 aml-0 amr-0 amt-1" src="https://www.economie.gouv.fr/files/files/directions_services/dgccrf/imgs/logos/logo-signal-conso.jpg" style="height:48px; width:100px" /></p>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div> |',
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::CONDITIONS as $key => $condition) {
      $description = $condition['description'];
      $newCondition = new ConditionGenDeVente();
      $newCondition->setDescription($description);
      $manager->persist($newCondition);
      $this->addReference('condition_' . ($key + 1), $newCondition);
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
    ];
  }
}
