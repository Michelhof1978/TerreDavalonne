<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Evenement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Evenement>
 *
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Evenement::class);
        $this->paginator = $paginator;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Evenement $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Evenement $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

        /**
     * Récupère les produits en lien avec une recherche
     * @return PaginationInterface
     */
    public function findSearch(SearchData $search): PaginationInterface
    {
        $query = $this
            ->createQueryBuilder('e')
            ->select('ep', 'e', 'es', 'eb', 't')
            ->join('e.elementbases', 'eb')
            ->join('e.elementSabbat', 'es')
            ->join('e.type', 't')
            ->join('e.elementPhyto', 'ep');

        if(!empty($search->q)){
            $query = $query
                ->andWhere('e.name LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        if(!empty($search->min)){
            $query = $query
                ->andWhere('e.price >= :min')
                ->setParameter('min', "%{$search->min}%");
        }

        if(!empty($search->max)){
            $query = $query
                ->andWhere('e.price <= :max')
                ->setParameter('max', "%{$search->max}%");
        }

        if(!empty($search->promo)){
            $query = $query
                ->andWhere('e.promo = 1');
        }

        if(!empty($search->elementPhytos)){
            $query = $query
                ->andWhere('ep.id IN (:elementPhyto)')
                ->setParameter('elementPhyto', $search->elementPhytos);
        }

        if(!empty($search->elementBases)){
            $query = $query
                ->andWhere('eb.id IN (:elementbases)')
                ->setParameter('elementbases', $search->elementBases);
        }

        if(!empty($search->elementSabbats)){
            $query = $query
                ->andWhere('es.id IN (:elementSabbat)')
                ->setParameter('elementSabbat', $search->elementSabbats);
        }

        if(!empty($search->type)){
            $query = $query
                ->andWhere('t.id IN (:type)')
                ->setParameter('type', $search->type);
        }

        $query = $query->getQuery();
        return $this->paginator->paginate(
            $query,
            $search->page,
            6
        );
    }

    /**
     * Récupère les produits en lien avec une recherche
     * @return PaginationInterface
     */
    public function listAction(SearchData $search, PaginatorInterface $paginator)
    {
        $query = $this
            ->createQueryBuilder('e')
            ->select('ep', 'e', 'es', 'eb', 't')
            ->join('e.elementBase', 'eb')
            ->join('e.elementSabbat', 'es')
            ->join('e.type', 't')
            ->join('e.elementPhyto', 'ep');

        $query = $query->getQuery();
        return $paginator->paginate(
            $query,
            $search->page,
            6
        );
    }

    // /**
    //  * @return Evenement[] Returns an array of Evenement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Evenement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
