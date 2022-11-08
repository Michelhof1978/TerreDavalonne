<?php

namespace App\Repository;

use App\Entity\ThemeContactezNous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ThemeContactezNous>
 *
 * @method ThemeContactezNous|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThemeContactezNous|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThemeContactezNous[]    findAll()
 * @method ThemeContactezNous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThemeContactezNousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ThemeContactezNous::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ThemeContactezNous $entity, bool $flush = true): void
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
    public function remove(ThemeContactezNous $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ThemeContactezNous[] Returns an array of ThemeContactezNous objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ThemeContactezNous
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
