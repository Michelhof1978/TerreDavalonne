<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\MagieVerte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<MagieVerte>
 *
 * @method MagieVerte|null find($id, $lockMode = null, $lockVersion = null)
 * @method MagieVerte|null findOneBy(array $criteria, array $orderBy = null)
 * @method MagieVerte[]    findAll()
 * @method MagieVerte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MagieVerteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, MagieVerte::class);
        $this->paginator = $paginator;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(MagieVerte $entity, bool $flush = true): void
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
    public function remove(MagieVerte $entity, bool $flush = true): void
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
            ->createQueryBuilder('p')
            ->select('ep', 'p', 'eb', 'es')
            ->join('p.elementPhyto', 'ep')
            ->join('p.elementBase', 'eb')
            ->join('p.elementSabbat', 'es');

        if(!empty($search->q)){
            $query = $query
                ->andWhere('p.name LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        if(!empty($search->min)){
            $query = $query
                ->andWhere('p.price >= :min')
                ->setParameter('min', "%{$search->min}%");
        }

        if(!empty($search->max)){
            $query = $query
                ->andWhere('p.price <= :max')
                ->setParameter('max', "%{$search->max}%");
        }

        if(!empty($search->promo)){
            $query = $query
                ->andWhere('p.promo = 1');
        }

        if(!empty($search->elementPhytos)){
            $query = $query
                ->andWhere('ep.id IN (:elementPhyto)')
                ->setParameter('elementPhyto', $search->elementPhytos);
        }

        if(!empty($search->elementBases)){
            $query = $query
                ->andWhere('eb.id IN (:elementBase)')
                ->setParameter('elementBase', $search->elementBases);
        }

        if(!empty($search->elementSabbats)){
            $query = $query
                ->andWhere('es.id IN (:elementSabbat)')
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
            ->createQueryBuilder('p')
            ->select('ep', 'p', 'eb', 'es')
            ->join('p.elementPhytos', 'ep')
            ->join('p.elementBases', 'eb')
            ->join('p.elementSabbats', 'es');

        $query = $query->getQuery();
        return $paginator->paginate(
            $query,
            $search->page,
            6
        );
    }

    // /**
    //  * @return MagieVerte[] Returns an array of MagieVerte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MagieVerte
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
