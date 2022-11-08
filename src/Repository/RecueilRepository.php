<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Recueil;
use App\Entity\TypeRecueil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Recueil>
 *
 * @method Recueil|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recueil|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recueil[]    findAll()
 * @method Recueil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecueilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Recueil::class);
        $this->paginator = $paginator;
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Recueil $entity, bool $flush = true): void
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
    public function remove(Recueil $entity, bool $flush = true): void
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
            ->createQueryBuilder('r')
            ->select('tr', 'r')
            ->join('r.typeRecueil', 'tr');

        if(!empty($search->q)){
            $query = $query
                ->andWhere('r.word LIKE :q')
                ->setParameter('q', "%{$search->q}%");
        }

        if(!empty($search->typeRecueil)){
            $query = $query
                ->andWhere('r.typeRecueil IN (:typeRecueil)')
                ->setParameter('typeRecueil', $search->typeRecueil);
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
            ->createQueryBuilder('r')
            ->select('tr', 'r')
            ->join('r.typeRecueil', 'tr');

        $query = $query->getQuery();
        return $paginator->paginate(
            $query,
            $search->page,
            6
        );
    }

    // /**
    //  * @return Recueil[] Returns an array of Recueil objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Recueil
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
