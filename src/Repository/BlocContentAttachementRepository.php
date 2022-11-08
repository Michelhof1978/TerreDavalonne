<?php

namespace App\Repository;

use App\Entity\BlocContentAttachement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BlocContentAttachement>
 *
 * @method BlocContentAttachement|null find($id, $lockMode = null, $lockVersion = null)
 * @method BlocContentAttachement|null findOneBy(array $criteria, array $orderBy = null)
 * @method BlocContentAttachement[]    findAll()
 * @method BlocContentAttachement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlocContentAttachementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BlocContentAttachement::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(BlocContentAttachement $entity, bool $flush = true): void
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
    public function remove(BlocContentAttachement $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return BlocContentAttachement[] Returns an array of BlocContentAttachement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BlocContentAttachement
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
