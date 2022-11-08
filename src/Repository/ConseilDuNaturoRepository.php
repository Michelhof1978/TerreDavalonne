<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\ConseilDuNaturo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<ConseilDuNaturo>
 *
 * @method ConseilDuNaturo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConseilDuNaturo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConseilDuNaturo[]    findAll()
 * @method ConseilDuNaturo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConseilDuNaturoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, ConseilDuNaturo::class);
        $this->paginator = $paginator;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ConseilDuNaturo $entity, bool $flush = true): void
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
    public function remove(ConseilDuNaturo $entity, bool $flush = true): void
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
            ->createQueryBuilder('c')
            ->select('ep', 'c')
            ->join('c.elementPhyto', 'ep');

        if(!empty($search->q)){
            $query = $query
                ->andWhere('c.conseil LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        // if(!empty($search->min)){
        //     $query = $query
        //         ->andWhere('c.price >= :min')
        //         ->setParameter('min', "%{$search->min}%");
        // }

        // if(!empty($search->max)){
        //     $query = $query
        //         ->andWhere('c.price <= :max')
        //         ->setParameter('max', "%{$search->max}%");
        // }

        // if(!empty($search->promo)){
        //     $query = $query
        //         ->andWhere('c.promo = 1');
        // }

        if(!empty($search->elementPhytos)){
            $query = $query
                ->andWhere('ep.id IN (:elementPhyto)')
                ->setParameter('elementPhyto', $search->elementPhytos);
        }

        if(!empty($search->elementBases)){
            $query = $query
                ->andWhere('ep.id IN (:elementBase)')
                ->setParameter('elementBase', $search->elementBases);
        }

        if(!empty($search->elementSabbats)){
            $query = $query
                ->andWhere('ep.id IN (:elementSabbat)')
                ->setParameter('elementSabbat', $search->elementSabbats);
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
            ->createQueryBuilder('c')
            ->select('ep', 'c')
            ->join('c.elementPhyto', 'ep');

        $query = $query->getQuery();
        return $paginator->paginate(
            $query,
            $search->page,
            6
        );
    }

    // /**
    //  * @return ConseilDuNaturo[] Returns an array of ConseilDuNaturo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConseilDuNaturo
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
