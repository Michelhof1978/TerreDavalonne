<?php

namespace App\Repository;

use App\Entity\ReponseGoldBook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReponseGoldBook>
 *
 * @method ReponseGoldBook|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReponseGoldBook|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReponseGoldBook[]    findAll()
 * @method ReponseGoldBook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseGoldBookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReponseGoldBook::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ReponseGoldBook $entity, bool $flush = true): void
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
    public function remove(ReponseGoldBook $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ReponseGoldBook[] Returns an array of ReponseGoldBook objects
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
    public function findOneBySomeField($value): ?ReponseGoldBook
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
