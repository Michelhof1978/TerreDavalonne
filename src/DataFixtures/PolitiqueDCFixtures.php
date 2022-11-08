<?php

namespace App\DataFixtures;

use App\Entity\ParametersGeneraux;
use App\Entity\PolitiqueConf;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PolitiqueDCFixtures extends Fixture implements DependentFixtureInterface
{
  const POLITIQUES = [
    [
      "description" => '<div id="leftDiv">
      <h2>Politique de confidentialit&eacute;</h2>
      
      <h3>Autres d&eacute;nominations :</h3>
      
      <p>La politique de confidentialit&eacute; est aussi connue sous les noms suivants&nbsp;:</p>
      
      <ul>
        <li>Conditions de confidentialit&eacute; d&#39;un site web</li>
        <li>Politique de confidentialit&eacute; et cookies</li>
        <li>Conditions de confidentialit&eacute; en ligne</li>
        <li>Conditions de protection des donn&eacute;es personnelles</li>
        <li>Conditions de vie priv&eacute; d&#39;un site web</li>
      </ul>
      
      <div>
      <h3>Qu&rsquo;est-ce qu&rsquo;une politique de confidentialit&eacute;&nbsp;?</h3>
      
      <div>
      <div>
      <p>Une politique de confidentialit&eacute; est un document juridiquement contraignant cr&eacute;&eacute; pour informer les personnes qui visitent votre site web, quels renseignements personnels sont recueillis, comment ces renseignements sont utilis&eacute;s et comment ils sont conserv&eacute;s en toute s&eacute;curit&eacute;.</p>
      
      <p>Une politique de confidentialit&eacute; comprend g&eacute;n&eacute;ralement les suivants :</p>
      
      <ul>
        <li>Les diff&eacute;rents types de renseignements qui peuvent &ecirc;tre recueillis sur le site web</li>
        <li>L&rsquo;objet de cette collection</li>
        <li>Renseignements sur le stockage, la s&eacute;curit&eacute; et la protection des donn&eacute;es</li>
        <li>D&eacute;tails de tout transfert de donn&eacute;es</li>
        <li>Tout tiers, sites web ou organisations affili&eacute;s</li>
        <li>Politique relative aux cookies</li>
      </ul>
      </div>
      </div>
      </div>
      
      <div>
      <h3>Une politique de confidentialit&eacute; est-elle n&eacute;cessaire ?</h3>
      
      <div>
      <div>
      <p>Si vous collectez des informations personnelles sur les visiteurs de votre site web, vous &ecirc;tes l&eacute;galement tenu d&rsquo;avoir une politique de confidentialit&eacute;. La plupart des pays dans le monde exigent des propri&eacute;taires de site d&rsquo;avoir une politique de confidentialit&eacute;. Il est important de vous assurer que votre site r&eacute;pond aux exigences l&eacute;gales de toute juridiction &agrave; partir de laquelle votre utilisateur peut acc&eacute;der &agrave; votre site.</p>
      
      <p>Voici des exemples de ce qui est consid&eacute;r&eacute; comme des renseignements personnels&nbsp;:</p>
      
      <ul>
        <li>Nom</li>
        <li>Date de naissance</li>
        <li>Adresse email</li>
        <li>Num&eacute;ro de t&eacute;l&eacute;phone</li>
        <li>Coordonn&eacute;es bancaires</li>
      </ul>
      
      <p>M&ecirc;me si vous ne recueillez pas d&rsquo;informations personnelles sur votre site, vous pouvez toujours souhaiter avoir une politique de confidentialit&eacute; dans le but d&rsquo;informer express&eacute;ment vos utilisateurs que leurs informations personnelles ne seront pas collect&eacute;es. Cela permet aux visiteurs de votre site de se sentir en s&eacute;curit&eacute; en utilisant votre site web.</p>
      </div>
      </div>
      </div>
      
      <div>
      <h3>Quels pays exigent une politique de confidentialit&eacute;&nbsp;?</h3>
      
      <div>
      <div>
      <p>La plupart des pays exigent que les utilisateurs du site aient une politique de confidentialit&eacute; lorsqu&rsquo;ils recueillent des renseignements personnels sur leurs utilisateurs. Voici un r&eacute;sum&eacute; de certaines mesures l&eacute;gislatives cl&eacute;s dans le monde.</p>
      
      <p><strong>Union Europ&eacute;enne</strong></p>
      
      <ul>
        <li>L&rsquo;UE a le R&egrave;glement g&eacute;n&eacute;ral sur la protection des donn&eacute;es (RGPD) qui s&rsquo;applique &agrave; tous les membres de l&rsquo;UE. Il exige que tout propri&eacute;taire de site recueillant les informations personnelles d&rsquo;un citoyen de l&rsquo;Union europ&eacute;enne ait une politique de confidentialit&eacute;.</li>
      </ul>
      
      <p><strong>Canada</strong></p>
      
      <ul>
        <li>Le Canada oblige les propri&eacute;taires de sites &agrave; se doter d&rsquo;une politique sur la protection des renseignements personnels en vertu de la Loi sur la protection des renseignements personnels et les documents &eacute;lectroniques (LPRPDE).</li>
      </ul>
      
      <p><strong>Royaume-Uni</strong></p>
      
      <ul>
        <li>Le Royaume-Uni applique une politique de confidentialit&eacute; par le biais du Data Protection Act 1998 (DPA).</li>
      </ul>
      
      <p><strong>&Eacute;tats-Unis</strong></p>
      
      <ul>
        <li>Les &Eacute;tats-Unis ont des lois f&eacute;d&eacute;rales et &eacute;tatiques qui contr&ocirc;lent la protection des renseignements personnels des utilisateurs des sites, mais les deux lois cl&eacute;s aux &Eacute;tats-Unis sont des lois californiens. Ils s&rsquo;agissent de la California Online Privacy Protection Act (CalOPPA) et de la California Consumer Privacy Act (CCPA). Chacun de ces lois exige que vous ayez une politique de confidentialit&eacute; si vous recueillez toute forme de renseignements personnels aupr&egrave;s des r&eacute;sidents de la Californie.</li>
      </ul>
      
      <p><strong>Australie</strong></p>
      
      <ul>
        <li>L&rsquo;Australian Privacy Act de 1988 exige que les entreprises soient transparentes dans leurs pratiques en mati&egrave;re de la protection de la vie priv&eacute;e. En d&rsquo;autres termes, il est pr&eacute;f&eacute;rable d&rsquo;avoir une politique de confidentialit&eacute; afin d&rsquo;&ecirc;tre clair quant &agrave; savoir si vous recueillez ou non des informations personnelles sur les visiteurs de votre site.</li>
      </ul>
      </div>
      </div>
      </div>
      
      <div>
      <h3>O&ugrave; devrais-je placer ma politique de confidentialit&eacute; sur mon site web ?</h3>
      
      <div>
      <div>
      <p>Vous devez vous assurer que votre politique de confidentialit&eacute; est facilement visible et accessible sur votre site. L&rsquo;emplacement le plus commun est le pied de page de votre site. Il est &eacute;galement judicieux de joindre un lien vers votre politique de confidentialit&eacute; lorsque vous demandez des informations personnelles &agrave; vos utilisateurs ou demandez &agrave; vos utilisateurs d&rsquo;accepter les termes de votre politique et/ou du site.</p>
      </div>
      </div>
      </div>
      
      <div>
      <h3>Quelle est la diff&eacute;rence entre une politique de confidentialit&eacute; et les conditions g&eacute;n&eacute;rales d&rsquo;un site web ?</h3>
      
      <div>
      <div>
      <p>Le but d&rsquo;une politique de confidentialit&eacute; est &agrave; des fins informatives, pour que les visiteurs sachent quels renseignements personnels sont recueillis et comment ils sont utilis&eacute;s et stock&eacute;s.</p>
      
      <p>Les conditions g&eacute;n&eacute;rales sont un accord entre les propri&eacute;taires du site et leurs visiteurs du site, qui &eacute;tablissent les conditions d&rsquo;utilisation du site. Une diff&eacute;rence cl&eacute; est que les politiques de confidentialit&eacute; sont souvent l&eacute;galement exig&eacute;es alors que les conditions g&eacute;n&eacute;rales ne sont pas l&eacute;galement exig&eacute;es. Les conditions g&eacute;n&eacute;rales sont souvent recommand&eacute;es pour inclure car il limite la responsabilit&eacute; du propri&eacute;taire du site ainsi que prot&egrave;ge les droits du contenu sur le site.</p>
      
      <p>L&rsquo;information souvent contenue dans les conditions g&eacute;n&eacute;rales comprend ce qui suit&nbsp;:</p>
      
      <ul>
        <li>Propri&eacute;t&eacute; intellectuelle</li>
        <li>Renseignements sur la facturation</li>
        <li>Abonnements et comptes</li>
        <li>Utilisation acceptable du site</li>
        <li>Activit&eacute;s interdites</li>
        <li>Garanties et avis de non-responsabilit&eacute;</li>
      </ul>
      </div>
      </div>
      </div>
      
      <h3>Formulaires connexes :</h3>
      
      <ul>
        <li><a href="https://www.documentslegaux.fr/commerce/conditions-generales-d-un-site-web/" target="_blank">Conditions g&eacute;n&eacute;rales d&#39;un site web</a> : Les conditions g&eacute;n&eacute;rales d&rsquo;un site web est un document qui d&eacute;taille l&#39;ensemble des obligations et droits des utilisateurs et du propri&eacute;taire du site web.</li>
      </ul>
      </div>',
    ],
  ];

  public function load(ObjectManager $manager)
  {
    foreach (self::POLITIQUES as $key => $politique) {
      $description = $politique['description'];
      $newPolitique = new PolitiqueConf();
      $newPolitique->setDescription($description);
      $manager->persist($newPolitique);
      $this->addReference('politique_' . ($key + 1), $newPolitique);
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
      HypnoseFixtures::class,
      ParamGenFixtures::class,
    ];
  }
}
