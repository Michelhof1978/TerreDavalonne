<?php

namespace App\Repository;

use App\Entity\PolitiqueConf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PolitiqueConf>
 *
 * @method PolitiqueConf|null find($id, $lockMode = null, $lockVersion = null)
 * @method PolitiqueConf|null findOneBy(array $criteria, array $orderBy = null)
 * @method PolitiqueConf[]    findAll()
 * @method PolitiqueConf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolitiqueConfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PolitiqueConf::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(PolitiqueConf $entity, bool $flush = true): void
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
    public function remove(PolitiqueConf $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return PolitiqueConf[] Returns an array of PolitiqueConf objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PolitiqueConf
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
