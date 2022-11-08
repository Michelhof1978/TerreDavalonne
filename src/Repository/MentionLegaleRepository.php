<?php

namespace App\Repository;

use App\Entity\MentionLegale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MentionLegale>
 *
 * @method MentionLegale|null find($id, $lockMode = null, $lockVersion = null)
 * @method MentionLegale|null findOneBy(array $criteria, array $orderBy = null)
 * @method MentionLegale[]    findAll()
 * @method MentionLegale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MentionLegaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MentionLegale::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(MentionLegale $entity, bool $flush = true): void
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
    public function remove(MentionLegale $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return MentionLegale[] Returns an array of MentionLegale objects
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
    public function findOneBySomeField($value): ?MentionLegale
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
