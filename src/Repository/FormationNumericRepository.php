<?php

namespace App\Repository;

use App\Entity\FormationNumeric;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FormationNumeric>
 *
 * @method FormationNumeric|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormationNumeric|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormationNumeric[]    findAll()
 * @method FormationNumeric[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormationNumericRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormationNumeric::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(FormationNumeric $entity, bool $flush = true): void
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
    public function remove(FormationNumeric $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return FormationNumeric[] Returns an array of FormationNumeric objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormationNumeric
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
