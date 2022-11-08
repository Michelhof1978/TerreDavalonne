<?php

namespace App\Repository;

use App\Entity\CoachingVideo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoachingVideo>
 *
 * @method CoachingVideo|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoachingVideo|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoachingVideo[]    findAll()
 * @method CoachingVideo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoachingVideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoachingVideo::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(CoachingVideo $entity, bool $flush = true): void
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
    public function remove(CoachingVideo $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return CoachingVideo[] Returns an array of CoachingVideo objects
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
    public function findOneBySomeField($value): ?CoachingVideo
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
