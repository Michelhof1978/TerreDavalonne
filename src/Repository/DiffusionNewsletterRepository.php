<?php

namespace App\Repository;

use App\Entity\DiffusionNewsletter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DiffusionNewsletter>
 *
 * @method DiffusionNewsletter|null find($id, $lockMode = null, $lockVersion = null)
 * @method DiffusionNewsletter|null findOneBy(array $criteria, array $orderBy = null)
 * @method DiffusionNewsletter[]    findAll()
 * @method DiffusionNewsletter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DiffusionNewsletterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DiffusionNewsletter::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DiffusionNewsletter $entity, bool $flush = true): void
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
    public function remove(DiffusionNewsletter $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DiffusionNewsletter[] Returns an array of DiffusionNewsletter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DiffusionNewsletter
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
